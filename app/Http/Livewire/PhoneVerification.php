<?php

namespace App\Http\Livewire;

use App\Exceptions\PhoneVerification\PhoneAuthLimitException;
use App\Models\PhoneVerificationCode;
use App\Models\User;
use App\Rules\PhoneNumber;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class PhoneVerification extends Component
{
    public $successEventName;

    public $userMustNotExist;

    public $userMustExist;

    public $successfullyConfirmed = false;

    public $codeSent = false;

    public $sendCountRemain;

    public $nextSend;

    public $phone;

    public $confirmedPhone;

    public $code = '';

    public $formName = '';

    protected $listeners = [
        'updatePhone',
    ];

    protected function rules() {
      return [
          'phone' => ['required', 'string', new PhoneNumber()],
          'code' => ['nullable', 'string'],
      ];
    }

    protected $messages = [
        'phone.required' => 'Поле обязательно для заполнения',
    ];

    public function mount(bool $userMustExist = false, bool $userMustNotExist = false, string $successEventName = 'phoneSuccessfullyConfirmed',string $formName = '')
    {
        $this->userMustExist = $userMustExist;
        $this->userMustNotExist = $userMustNotExist;
        $this->successEventName = $successEventName;
        $this->formName = $formName;
    }

    public function render()
    {
        return view('livewire.phone-verification');
    }

    public function nextSend()
    {
        if($this->code)
        {
            $this->nextSend = false;
            return;
        }

        $this->nextSend = PhoneVerificationCode::nextSend($this->phone);
    }

    public function sendCountRemain()
    {
        $this->sendCountRemain = PhoneVerificationCode::sendCountRemain($this->phone);
    }

    public function sendCode() {
        $this->validate();

        try {
            if ($this->userMustNotExist && User::existsWithPhone(Str::phoneNumber($this->phone))) {
                $this->addError('phone', 'Такой номер уже зарегистрирован');
            }
            elseif ($this->userMustExist && !User::existsWithPhone(Str::phoneNumber($this->phone))) {
                $this->addError('phone', 'Такой номер не зарегистрирован');
            }
            else {
                $this->phoneVerificationCode = PhoneVerificationCode::sendCode($this->phone);

                $this->nextSend();
                $this->sendCountRemain();

                $this->resetErrorBag();
                $this->resetValidation();

                $this->codeSent = true;
            }

        } catch (PhoneAuthLimitException $e) {
            $this->addError("phone", $e->getMessage());
        }
    }

    public function verify()
    {
        ['code' => $code, 'phone' => $phone] = $this->validate();
        if (PhoneVerificationCode::validateCode($code, Str::phoneNumber($phone))) {
            try {
                $this->successfullyConfirmed = true;
                $this->confirmedPhone = $this->phone;

                if(
                    $this->checkUserExists(Str::phoneNumber($phone)) &&
                    $this->successEventName != 'forgotVerified'
                )
                {
                    $user = User::where('phone', Str::phoneNumber($phone))->first();
                    $isAuth = Auth::login($user);
                    $this->successEventName = 'showAuth';
                }
                else
                    $this->successEventName = 'phoneSuccessfullyConfirmed';

                $this->emit($this->successEventName, [
                    'success' => $this->successfullyConfirmed,
                    'phone' => Str::phoneNumber($this->confirmedPhone),
                    'code' => $code,
                ]);

            } catch (Exception) {
                $this->addError('code', 'Произошла ошибка при верификации. Повторите попытку позже.');
            }
        } else {
            $this->addError("code", 'Код введен не правильно');
        }
    }

    public function checkUserExists($phone): bool
    {
        $user = User::where('phone', $phone)->first();

        if(!$user)
            return false;

        return true;
    }

    public function updatePhone(array $params)
    {
        $this->phone = $params['phone'];
    }
}
