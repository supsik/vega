<?php

namespace App\Http\Livewire\Auth;

use App\Medods\Exceptions\MedodsException;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Livewire\Component;
use App\Models\PhoneVerificationCode;

class Register extends Component
{
    public $medodsUser;

    public string $verifiedPhone;

    public string $name;

    public string $surname;

    public string $password;

    public string $password_confirmation;

    public bool $showRegistrationForm = false;

    public bool $showCreatePasswordForm = false;

    public int $userMustNotExists;

    public int $showAuthForm;
    public string $idNumber;

    public string $successEventName = '';

    public int $redirect;

    protected $listeners = [
        'registerVerified',
        'showAuth',
    ];


    public function mount(string $successEventName = '', int $userMustNotExists = 1, int $showAuthForm = 1, string $idNumber = '', $redirect=0)
    {
        $this->successEventName = $successEventName;
        $this->userMustNotExists = $userMustNotExists;
        $this->showAuthForm = $showAuthForm;
        $this->idNumber = $idNumber;
        $this->redirect = $redirect;
    }

    protected function rules(): array
    {
        if ($this->showRegistrationForm) {
            return [
                'name' => ['required', 'string', 'min:3', 'max:30'],
                'surname' => ['required', 'string', 'min:3', 'max:30'],
                'password' => ['required', 'string', 'confirmed', 'min:8', 'max:30'],
            ];
        }

        if ($this->showCreatePasswordForm) {
            return [
                'password' => ['required', 'string', 'confirmed', 'min:8', 'max:30'],
            ];
        }
    }

    public function showAuth(array $params)
    {
        $this->emit('registerSuccess', [
                'success' => true,
            ]
        );
    }

    public function registerVerified(array $params)
    {
        $this->verifiedPhone = $params['phone'];

        if(isset($params['successEvent']))
            $this->successEventName = $params['successEvent'];

        try {
            ['data' => $data, 'totalItems' => $totalItems] = app('medods')->client()->list([
                'offset' => 0,
                'limit' => 1,
                'phone' => $this->verifiedPhone,
            ]);

            if ($totalItems > 0) {
                $this->medodsUser = $data[0];
                $this->showCreatePasswordForm = true;
            } else {
                $this->showRegistrationForm = true;
            }
            $this->flush($params['phone'], $params['code']);
        } catch (MedodsException) {
            $this->emit('flash', 'danger', 'Произошла ошибка при регистрации. Повторите попытку позже.');
        }
    }

    public  function flush($phone, $code)
    {
        $code = PhoneVerificationCode::where(['phone' => $phone, 'code' => $code])->first();
        if(!$code)
            return true;

        return $code->delete();
    }

    public function render(): View
    {
        return view('livewire.auth.register');
    }

    public function createUserPassword()
    {
        $this->validate();

        $credentials = User::create([
            'medodsId' => $this->medodsUser['id'],
            'phone' => $this->verifiedPhone,
            'password' => Hash::make($this->password),
        ]);

        Auth::login($credentials);

        if($this->successEventName != '' && $this->redirect != 1)
            $this->emit($this->successEventName, ['success' => true]);
        else
            return redirect()->intended('user/profile');
    }

    public function registerUser()
    {
        $data = $this->validate();

        try {
            $medodsUser = app('medods')->client()->create([
                'phone' => $this->verifiedPhone,
                'name' => $data['name'],
                'surname' => $data['surname'],
                'denyCalls' => true,
                'denyEmail' => true,
                'denySmsNotifications' => true,
                'denySmsDispatches' => true,
                'denyWhatsappMessages' => true,
            ]);

            $credentials = User::create([
                'medodsId' => $medodsUser['id'],
                'phone' => $this->verifiedPhone,
                'password' => Hash::make($this->password),
            ]);

            Auth::login($credentials);

            flash()->success('Регистрация прошла успешно! Вы вошли в личный кабинет');

            return redirect()->intended('user/profile');
        } catch (MedodsException) {
            $this->emit('flash', 'danger', 'Произошла ошибка при регистрации. Повторите попытку позже.');
        }
    }
}
