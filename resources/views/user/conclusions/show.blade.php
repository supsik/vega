@extends('layouts.main')

@section('title', 'Заключения - '  . config('app.name'))

@section('content')
    <div class="account-page">
        <div class="container-fluid">
            <div class="account-page__inner">
                <x-breadcrumbs>
                    <x-breadcrumbs.item isActive isLarge>Заключения</x-breadcrumbs.item>
                </x-breadcrumbs>


                <div class="account-page__forms section-top-space">
                    <div class="row">
                        <div class="col-12">

                            @include('user.partials.menu')

                            <section class="price-list">
                                <div class="price-list__wrapper">
                                    @if(
                                        $conclusion['state'] === 'ready' &&
                                        \Illuminate\Support\Carbon::parse($conclusion['date']) >= \Illuminate\Support\Carbon::parse('10.08.2023')
                                    )
                                        <a href="{{ route('user.pdf', $conclusion['id']) }}"
                                           class="mb-4 btn btn-outline-dark"
                                           target="_blank"
                                        >
                                            Скачать заключение
                                        </a>
                                    @endif

                                    <div class="card mb-4">
                                        <div class="card-header">
                                            Информация о приеме
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <b>Статус:</b>
                                                <span>{{ __('custom.' . $conclusion['state']) }}</span>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Услуга:</b>
                                                <span>{{ $conclusion['title'] }}</span>
                                            <li class="list-group-item">
                                                <b>Дата:</b>
                                                <span>{{ __date($conclusion['date']) }}</span>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Стоимость:</b>
                                                <span>{{ price($conclusion['finalsum']) }}</span>
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
