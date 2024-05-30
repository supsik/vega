<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use App\Models\PhoneVerificationCode;


class ForgotPassword extends Component
{
    public bool $showUpdatePasswordForm = false;

    public string $verifiedPhone;

    public string $password;

    public string $password_confirmation;

    protected $listeners = [
        'forgotVerified',
    ];

    protected function rules()
    {
        return [
            'password' => ['required', 'string', 'confirmed', 'min:8', 'max:30'],
        ];
    }

    public function render()
    {
        return view('livewire.auth.forgot-password');
    }

    public function forgotVerified(array $params)
    {
        $this->showUpdatePasswordForm = true;
        $this->verifiedPhone = $params['phone'];
        $this->flush($params['phone'], $params['code']);
    }

    public  function flush($phone, $code)
    {
        $code = PhoneVerificationCode::where(['phone' => $phone, 'code' => $code])->first();
        if(!$code)
            return true;

        return $code->delete();
    }

    public function updatePassword()
    {
        $this->validate();

        $user = User::where('phone', $this->verifiedPhone);

        if ($user->count()) {
            $user->update(['password' => Hash::make($this->password)]);

            $isAuth = Auth::attempt([
                'phone' => $this->verifiedPhone,
                'password' => $this->password
            ]);

            if ($isAuth) {
                flash()->success('Пароль обновлен! Вы вошли в личный кабинет');

                return redirect()->intended('user/profile');
            }
        } else {
            $this->addError('phone', 'Аккаунта с таким номером телефона не существует');
        }
    }
}
