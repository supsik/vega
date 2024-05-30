<?php

namespace App\Models;

use App\Casts\PhoneCast;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Cache;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'phone',
        'medodsId',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'phone' => PhoneCast::class,
    ];

    public static function existsWithPhone(string $phone)
    {
        return User::where('phone', $phone)->exists();
    }

    public function getMedodsUser()
    {
        $key = "user_{$this->medodsId}";

        if(!Cache::has($key))
        {
            $user = app('medods')->client()->find($this->medodsId);
            Cache::store('file')->put($key, $user);
        }

        return Cache::store('file')->get($key);
    }

    public function getShortName()
    {
        $user = $this->getMedodsUser();

        return mb_substr($user['name'], 0, 1) ?? 'П';
    }
}
