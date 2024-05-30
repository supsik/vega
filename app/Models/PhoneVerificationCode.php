<?php

namespace App\Models;

use App\Casts\PhoneCast;
use App\Exceptions\PhoneVerification\PhoneAuthLimitException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PhoneVerificationCode extends Model
{
    protected $fillable = [
        'ip',
        'phone',
        'code',
        'expires_at',
    ];

    protected $casts = [
        'phone' => PhoneCast::class,
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function (Model $model) {
            $code = rand(pow(10, config('phone_verification.code_length') - 1), pow(10, config('phone_verification.code_length')) - 1);

            $model->ip = self::getIp();
            $model->code = $code;
            $model->expires_at = now()->addSeconds(config('phone_verification.expire_seconds'));

            app("sms")->send($model->phone, "Код подтверждения для входа в личный кабинет mega-clinic.ru: {$code}");
        });
    }

    public function scopeUnexpired(Builder $query,string $phone): Builder
    {
        return $query->where('phone', Str::phoneNumber($phone))->where('expires_at', '>=', now());
    }

    public function scopeLimiter(Builder $query,string $phone): Builder
    {
        return $query->where('phone', Str::phoneNumber($phone))->where('expires_at', '>=', now());
    }


    public static function nextSend($phone) {
        $nexSendTimestamp = self::query()->unexpired($phone)->max('created_at');
        $nexSendTimestamp = $nexSendTimestamp ? now()->setDateTimeFrom($nexSendTimestamp)->addSeconds(config('phone_verification.next_send_after')) : now();

        return $nexSendTimestamp->isPast() ? 0 : now()->diffInSeconds($nexSendTimestamp);
    }


    public static function sendCountRemain($phone) {
        $sendCount = config('phone_verification.limit_send_count') - self::query()->limiter($phone)->count();

        return $sendCount < 0 ? 0 : $sendCount;
    }


    public static function sendCount($phone) {
        return self::query()->limiter($phone)->count();
    }


    /**
     * @throws PhoneAuthLimitException
     */
    public static function sendCode($phone) {

        $nextSend = self::nextSend($phone);
        $sendCount = self::sendCount($phone);

        if($nextSend > 0) {
            throw new PhoneAuthLimitException("Ограничение в отправке смс. Попробуйте через {$nextSend} секунд.");
        }

        if(config('phone_verification.limit_send_count') > $sendCount) {
            return self::create(["phone" => $phone]);
        } else {
            throw new PhoneAuthLimitException("Ограничение в количестве отправок - {$sendCount}");
        }
    }


    public static function validateCode($code, $phone) {
        return self::query()->unexpired($phone)
            ->where("code", $code)->count();
    }

    protected static function getIp(): string
    {
        return request()->ip();
    }
}
