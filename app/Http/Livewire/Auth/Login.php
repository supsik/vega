<?php

namespace App\Http\Livewire\Auth;

use App\Medods\Exceptions\MedodsException;
use App\Models\User;
use App\Rules\PhoneNumber;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Livewire\Component;

class Login extends Component
{
    public string $phone;

    public string $password;

    public string $successEvent;
    public bool $authByPassword = false;
    public string $idNumber;
    public int $redirect;

    protected $listeners = [
        'toggleCheckbox',
        'showAuth',
        'phoneSuccessfullyConfirmed',
    ];

    public function mount(string $phone = '', string $successEvent = '', string $idNumber = '', int $redirect = 0): void
    {
        $this->phone = $phone;
        $this->successEvent = $successEvent;
        $this->idNumber = $idNumber;
        $this->redirect = $redirect;
    }

    protected function rules()
    {
        return [
            'phone' => ['required', 'string', new PhoneNumber()],
            'password' => ['required', 'string'],
        ];
    }

    public function render(): View
    {
        return view('livewire.auth.login');
    }

    public function showAuth(array $params)
    {
        if($this->redirect)
            return redirect()->intended('user/profile');

        return;
    }
    
    public function phoneSuccessfullyConfirmed(array $params)
    {
        $params['successEvent'] = 'registerSuccess';

        $this->emit('registerVerified', $params);
    }

    public function login()
    {
        $this->validate();

        $phone = Str::phoneNumber($this->phone);

        $isAuth = Auth::attemptWhen([
            'phone' => $phone,
            'password' => $this->password
        ], function () use ($phone) {
            try {
                $user = User::query()->where('phone', $phone)->first();

                $medodsUser = app('medods')->client()->find($user->medodsId);

                return true;
            } catch (MedodsException $e) {
                if ($e->getCode() === 404) {
                    ['data' => $data, 'totalItems' => $totalItems] = app('medods')->client()->list([
                        'limit' => 1,
                        'offset' => 0,
                        'phone' => $phone
                    ]);

                    if ($totalItems > 0) {
                        $user->update(['medodsId' => $data[0]['id']]);
                    }

                    return $totalItems > 0;
                }

                $this->emit('flash', 'danger', 'Произошла ошибка при аутентификации. Повторите попытку позже.');
            }
        });

        if ($isAuth) {

            if($this->successEvent != '' && $this->redirect != 1)
            {
                $this->emit($this->successEvent, [
                    'success' => true,
                ]
                );
                return;

            }
            flash()->success('Вы успешно вошли в личный кабинет');

            return redirect()->intended('user/profile');
        } else {
            $this->addError('phone', 'Неправильный номер телефона или пароль');
        }
    }

    public function toggleCheckbox(array $params)
    {
        $this->authByPassword = !$this->authByPassword;
        if($params['selected'])
            $this->phone = $params['phone'];
        else
            $this->emitTo('phone-verification', 'updatePhone', ['phone' => $params['phone']]);
    }
}
