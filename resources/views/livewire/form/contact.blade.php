<x-form class="contacts-section__form" wire:submit.prevent="send">

    <x-form.input
        wire:model.lazy="name"
        :isError="$errors->has('name')"
        :errorMessage="$errors->first('name')"
        id="name"
        label="Ваше имя"
        type="text"
        placeholder="Введите имя"
        autofocus
        required>
    </x-form.input>

    <x-form.input
        wire:model.lazy="email"
        :isError="$errors->has('email')"
        :errorMessage="$errors->first('email')"
        id="email"
        label="Email"
        type="email"
        placeholder="Контактный email"
        required>
    </x-form.input>

    <x-form.input
        wire:model.lazy="phone"
        x-data="{}"
        x-mask="+7 (999) 999-99-99"
        :isError="$errors->has('phone')"
        :errorMessage="$errors->first('phone')"
        id="phone"
        label="Телефон"
        type="text"
        placeholder="Контактный телефон"
        required>
    </x-form.input>

    <x-form.textarea
        wire:model.lazy="message"
        :isError="$errors->has('message')"
        :errorMessage="$errors->first('message')"
        id="message"
        label="Ваше сообщение"
        placeholder="Текст сообщения"
        rows="5"
        required>
    </x-form.textarea>

    <x-form.button type="submit" wire:loading.attr="disabled" wire:target="send">
        <div wire:loading wire:target="send">
            <x-form.spinner></x-form.spinner>
        </div>

        Отправить
    </x-form.button>

    <x-form.agrement></x-form.agrement>
</x-form>
