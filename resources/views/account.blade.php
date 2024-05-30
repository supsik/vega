@extends('layouts.main')

@section('title', 'Вход в личный кабинет - ' . config('app.name'))

@section('content')
    <div class="account-page">
        <div class="container-fluid">
            <div class="account-page__inner">

                <x-breadcrumbs>
                    <x-breadcrumbs.item isActive isLarge>Личный кабинет</x-breadcrumbs.item>
                </x-breadcrumbs>


                <div class="account-page__forms section-top-space">
                    <div class="row">
                        <div class="col-12 offset-md-2 col-md-8">

                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                            aria-selected="true" data-name="entrance" onclick="megaAuth.getFormName(this)">Вход
                                    </button>
                                    <button class="nav-link nav-link-create" id="nav-profile-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-profile" type="button" role="tab"
                                            aria-controls="nav-profile" aria-selected="false" data-name="reg" 
                                            onclick="megaAuth.getFormName(this)">Регистрация
                                    </button>
                                    <button class="nav-link nav-link-forgot" id="nav-contact-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-contact" type="button" role="tab"
                                            aria-controls="nav-contact" aria-selected="false" data-name="reset" 
                                            onclick="megaAuth.getFormName(this)">Сбросить пароль
                                    </button>
                                </div>
                            </nav>


                            <div class="tab-content" id="nav-tabContent">

                                <div class="tab-pane fade show active selected-tab" id="nav-home" role="tabpanel"
                                     aria-labelledby="nav-home-tab" tabindex="0">
                                    
                                    <livewire:auth.register showAuthForm="1" redirect="1"/>

                                </div>

                                <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                     aria-labelledby="nav-profile-tab" tabindex="0">
                                    <livewire:auth.register showRegistrationForm="0"/>
                                    <livewire:auth.register showRegistrationForm="1"/>
                                </div>

                                <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                     aria-labelledby="nav-contact-tab" tabindex="0">
                                    <livewire:auth.forgot-password/>
                                    <x-form class="account-page__form account-page__detail contact-form  d-none">
                                        <x-form.input
                                            oninput="megaAuth.resetError(this)"
                                            label="Пароль"
                                            data-validate="password"
                                            type="password"
                                            id="register_password"
                                            type="password"
                                            placeholder="Введите пароль"
                                            required>
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

                                        <x-form.button type="button" onclick="megaAuth.reset(event)">
                                            Создать
                                        </x-form.button>
                                        <div class="account-page__form-error d-none">Что то пощло не так</div>
                                    </x-form>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
