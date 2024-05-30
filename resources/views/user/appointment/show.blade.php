@extends('layouts.main')

@section('title', 'Запись на прием - ' . config('app.name'))

@section('content')
    <div class="account-page">
        <div class="container-fluid">
            <div class="account-page__inner">
                <x-breadcrumbs>
                    <x-breadcrumbs.item isActive isLarge>Запись на прием</x-breadcrumbs.item>
                </x-breadcrumbs>


                <div class="account-page__forms section-top-space">
                    <div class="row">
                        <div class="col-12">

                            @include('user.partials.menu')

                            <section class="price-list">
                                <div class="price-list__wrapper">

                                    <div class="card mb-4">
                                        <div class="card-header">
                                            Информация о приеме
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <b>Статус:</b>
                                                {{ __('custom.' . $appointment['status']) }}
                                            </li>
                                            <li class="list-group-item">
                                                <b>Тип приема:</b>
                                                <span>{{ $appointment['appointmentType']['title'] }}</span>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Услуга:</b>
                                                <span>{{ $entry['title'] }}</span>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Дата:</b>
                                                <span>{{ __date($appointment['date']) }}</span>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Время:</b>
                                                <span>{{ $appointment['time'] }}</span>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Продолжительность приема:</b>
                                                <span>{{ $appointment['duration'] }} мин.</span>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Стоимость:</b>
                                                <span>{{ price($entry['price']) }}</span>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            Информация о враче
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <b>ФИО:</b>
                                                <span>{{ $doctor['surname'] }} {{ $doctor['name'] }} {{ $doctor['secondName'] }}</span>
                                            </li>
                                            @if($doctor['note'])
                                                <li class="list-group-item">
                                                    {{ $doctor['note'] }}
                                                </li>
                                            @endif
                                        </ul>
                                    </div>

                                </div>
                            </section>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
