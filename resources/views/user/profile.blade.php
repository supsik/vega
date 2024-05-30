@extends('layouts.main')

@section('title', 'Личный кабинет - ' . config('app.name'))

@section('content')
    <div class="account-page">
        <div class="container-fluid">
            <div class="account-page__inner">

                <x-breadcrumbs>
                    <x-breadcrumbs.item isActive isLarge>Личный кабинет</x-breadcrumbs.item>
                </x-breadcrumbs>


                <div class="account-page__forms section-top-space">
                    <div class="row">
                        <div class="col-12">

                            @include('user.partials.menu')

                            <x-form class="account-page__form contact-form"
                                    action="{{ route('user.profile.update', request()->user()->medodsId) }}"
                                    method="post">
                                @method('patch')

                                <div class="row">
                                    <div class="col-12">
                                        <x-alert>Для изменения личных данных обратитесь в клинику</x-alert>
                                    </div>

                                    <div class="col-12 col-md-4">
                                        <x-form.input
                                            id="name"
                                            label="Ваше имя"
                                            type="text"
                                            placeholder="Имя"
                                            :value="old('name') ?? $user['name']"
                                            readonly
                                            disabled
                                        >
                                        </x-form.input>
                                    </div>

                                    <div class="col-12 col-md-4">
                                        <x-form.input
                                            id="surname"
                                            label="Ваша фамилия"
                                            type="text"
                                            placeholder="Фамилия"
                                            :value="old('surname') ?? $user['surname']"
                                            readonly
                                            disabled
                                        >
                                        </x-form.input>
                                    </div>

                                    <div class="col-12 col-md-4">
                                        <x-form.input
                                            id="secondName"
                                            label="Ваше отчество"
                                            type="text"
                                            placeholder="Отчество"
                                            :value="old('secondName') ?? $user['secondName']"
                                            readonly
                                            disabled
                                        >
                                        </x-form.input>
                                    </div>
                                </div>

                                <x-form.select
                                    id="sex"
                                    label="Пол"
                                    :fields="[
                                        'Мужской' => 'male',
                                        'Женский' => 'female',
                                    ]"
                                    :value="old('sex') ?? $user['sex']"
                                    readonly
                                    disabled
                                >
                                </x-form.select>

                                <x-form.input
                                    id="birthdate"
                                    label="Дата рождения"
                                    type="date"
                                    :value="old('birthdate') ?? $user['birthdate']"
                                    readonly
                                    disabled
                                ></x-form.input>

                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <x-form.input
                                            x-data="{}"
                                            x-mask="+7 (999) 999-99-99"
                                            id="phone"
                                            label="Телефон"
                                            type="text"
                                            :value="$user['phone']"
                                            readonly
                                            disabled
                                        >
                                        </x-form.input>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <x-form.input
                                            :isError="$errors->has('email')"
                                            :errorMessage="$errors->first('email')"
                                            id="email"
                                            label="Email"
                                            type="email"
                                            name="email"
                                            :value="old('email') ?? $user['email']"
                                            placeholder="Контактный email"
                                        >
                                        </x-form.input>
                                    </div>
                                </div>

                                <x-form.input
                                    id="patientCardNumber"
                                    label="Номер карты пациента"
                                    type="text"
                                    placeholder="Номер карты"
                                    disabled
                                    readonly
                                >
                                </x-form.input>

                                <x-form.input
                                    id="serviceCard"
                                    label="Сервисная карта"
                                    type="text"
                                    placeholder="Сервисная карта"
                                    disabled
                                    readonly
                                >
                                </x-form.input>

                                <x-form.switch
                                    id="denyCalls"
                                    label="Не звонить"
                                    name="denyCalls"
                                    :checked="$user['denyCalls']"
                                ></x-form.switch>


                                <x-form.switch
                                    id="denyEmail"
                                    label="Не отправлять email"
                                    name="denyEmail"
                                    :checked="$user['denyEmail']"
                                ></x-form.switch>

                                <x-form.switch
                                    id="denySmsNotifications"
                                    label="Не отправлять смс-уведомления"
                                    name="denySmsNotifications"
                                    :checked="$user['denySmsNotifications']"
                                ></x-form.switch>

                                <x-form.switch
                                    id="denySmsDispatches"
                                    label="Не отправлять смс-рассылки"
                                    name="denySmsDispatches"
                                    :checked="$user['denySmsDispatches']"
                                ></x-form.switch>

                                <x-form.button>
                                    Сохранить
                                </x-form.button>
                            </x-form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
