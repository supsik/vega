<div>
    @if($showRegistrationForm)
        <x-form class="account-page__form contact-form account-page__detail d-none">
            <x-form.input
                id="register_name"
                oninput="megaAuth.resetError(this)"
                label="Ваше имя"
                type="text"
                placeholder="Введите имя"
                required
            >
            </x-form.input>

            <x-form.input
                id="register_surname"
                oninput="megaAuth.resetError(this)"
                label="Ваша фамилия"
                type="text"
                placeholder="Введите фамилию"
                required
            >
            </x-form.input>

            <x-form.input
                id="register_password"
                oninput="megaAuth.resetError(this)"
                label="Пароль"
                data-validate="password"
                type="password"
                placeholder="Введите пароль"
                required
            >
            </x-form.input>

            <x-form.input
                id="register_password_confirmation"
                oninput="megaAuth.resetError(this)"
                label="Повтор пароля"
                data-validate="secPas"
                onchange="megaAuth.repetPassword(this)"
                type="password"
                placeholder="Повторите пароль"
                required
            >
            </x-form.input>

            <x-form.button type="button" onclick="megaAuth.registration(event)">
                Создать
            </x-form.button>
            <div class ="account-page__form-error d-none">Что то пощло не так</div>
        </x-form>
    @elseif($showCreatePasswordForm)
    <x-form class="account-page__form account-page__detail contact-form">
            <x-form.input
                wire:model.lazy="password"
                id="register_password"
                label="Пароль"
                type="password"
                placeholder="Введите пароль"
                required>
            </x-form.input>

            <x-form.input
                id="register_password_confirmation"
                label="Повтор пароля"
                type="password"
                placeholder="Повторите пароль"
                required
            >
            </x-form.input>

            <x-form.button type="button" >
                Создать
            </x-form.button>
            <div class ="account-page__form-error d-none">Что то пощло не так</div>
        </x-form>
    @elseif($showAuthForm)
        <livewire:auth.login successEvent="registerSuccess" idNumber="{{$idNumber}}" redirect="{{$redirect}}"/>
    @else
        <livewire:phone-verification :userMustNotExist="$userMustNotExists" successEventName="registerVerified"/>
    @endif
</div>
