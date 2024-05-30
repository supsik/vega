<x-form class="employee-page__form" wire:submit.prevent="send">
    <x-form.heading>
        Вы всегда можете оставить пожелание, задать вопрос или написать отзыв о работе любого сотрудника нашей МегаКоманды
    </x-form.heading>

    <x-form.input
        wire:model.lazy="name"
        :isError="$errors->has('name')"
        :errorMessage="$errors->first('name')"
        id="name"
        label="Кому адресовано Ваше сообщение"
        type="text"
        name="name"
        value="{{ $name }}"
        placeholder="Введите имя"
        required>
    </x-form.input>
    <x-form.input
        wire:model.lazy="phone"
        :isError="$errors->has('phone')"
        :errorMessage="$errors->first('phone')"
        id="phone"
        x-init="$watch('phone', (value, oldValue) =>  phone = oldValue.length === 0 ? value.replace('+7 (8', '+7 (') : value)"
        x-mask="+7 (999) 999-99-99"
        label="Телефон"
        type="text"
        name="phone"
        value=""
        placeholder="Перезвонить Вам ?">
    </x-form.input>

    <x-form.textarea
        wire:model.lazy="message"
        :isError="$errors->has('message')"
        :errorMessage="$errors->first('message')"
        id="message"
        label="Ваше сообщение"
        name="message"
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
    <div class="employee-page__submitted hidden">Благодарим Вас за обратную связь!</div>
</x-form>
