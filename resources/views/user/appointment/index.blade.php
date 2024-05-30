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
                                    @forelse ($appointments as $appointment)
                                        <div class="price-list__item">
                                            <span class="price-list__item-name" itemprop="makesOffer">
                                                {{ $appointment['appointmentType']['title'] }}
                                            </span>
                                            <span class="price-list__item-cost">
                                                {{ __date($appointment['date']) }} {{ $appointment['time'] }}
                                            </span>

                                            <div class="price-list__item-actions">
                                                <a href="{{ route('user.appointment.show', $appointment['id']) }}"
                                                   class="price-list__item-btn btn btn-main">Просмотр</a>

                                                <form
                                                    action="{{ route('user.appointment.destroy', $appointment['id']) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')

                                                    @if(in_array($appointment['status'], ['need_approval', 'confirmed_by_administrator', 'approved'])  )
                                                        <button class="price-list__item-btn btn btn-danger"
                                                                type="submit">
                                                            Отменить
                                                        </button>
                                                    @endif
                                                </form>
                                            </div>
                                        </div>
                                    @empty
                                        <x-alert>
                                            На данный момент у нас нет свободных записей на прием
                                        </x-alert>
                                    @endforelse

                                    {{ $appointments->links() }}
                                </div>
                            </section>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
