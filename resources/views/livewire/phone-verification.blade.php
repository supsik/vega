@php
    $phoneId = uniqid('phone');
    $codeId = uniqid('code');
@endphp


<form class="account-page__form contact-form"  method="POST">
    <x-form.input
        data-maska="+7(###)###-##-##"
        data-maska-tokens="A:[A-Z]"
        data-validate="phone"
        oninput="megaAuth.resetError(this)"
        :id="$phoneId"
        label="Номер телефона"
        type="text"
        placeholder="Введите номер телефона"
        required
        autocomplete="phone"
        class="_password-input"
    >
    </x-form.input>

    <div class="phone-verification">
        <div class="phone-verification__code me-2">
            <x-form.input
                data-maska="####" 
                data-validate="code"
                oninput="megaAuth.resetError(this)"
                :id="$codeId"
                label="Код"
                type="text"
                placeholder="Введите код из смс"
                required
            >
            </x-form.input>
        </div>

        @if($nextSend)
            <x-form.button class="phone-verification__btn" wire:poll="nextSend" disabled type="button"
                           color="dark">{{ $nextSend }}</x-form.button>
        @else
            <x-form.button class="phone-verification__btn" type="button" color="dark"
                           onclick="megaAuth.getCode(event)">
                Получить код
            </x-form.button>
        @endif
    </div>
    <x-form.button  type="button" class="d-none" onclick="megaAuth.confirm(event)">
        Подтвердить
    </x-form.button>
    @if($codeSent)
        <x-form.button type="submit">
            Подтвердить
        </x-form.button>
    @endif
    <div class ="account-page__form-error d-none">Что то пощло не так</div>
</form>


