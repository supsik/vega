<div>
    @if($showUpdatePasswordForm)
        <x-form class="account-page__form contact-form ">
            <x-form.input
                id="forgot_password"
                oninput="megaAuth.resetError(this)"
                label="Пароль"
                data-validate="password"
                label="Новый пароль"
                type="password"
                placeholder="Введите пароль"
                required
            >
            </x-form.input>

            <x-form.input
                oninput="megaAuth.resetError(this)"
                label="Повтор пароля"
                data-validate="secPas"
                onchange="megaAuth.repetPassword(this)"
                type="password"
                placeholder="Повторите пароль"
                required
            >
            </x-form.input>

            <x-form.button type="button" onclick="megaAuth.reset(event)">
                Обновить пароль
            </x-form.button>
        </x-form>
    @else
        <livewire:phone-verification :userMustExist="true" successEventName="forgotVerified"/>
    @endif
</div>
