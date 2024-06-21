@extends('layouts.main')

@section('title', 'Анализы - ' . config('app.name'))

@section('content')
    <div class="account-page">
        <div class="container-fluid">
            <div class="account-page__inner">

                <x-breadcrumbs>
                    <x-breadcrumbs.item isActive isLarge>Анализы</x-breadcrumbs.item>
                </x-breadcrumbs>


                <div class="account-page__forms section-top-space">
                    <div class="row">
                        <div class="col-12">

                            @include('user.partials.menu')

                            <section class="price-list">
                                <div class="price-list__wrapper" >
                                    @forelse ($analysis as $analysisItem)
                                        <div class="price-list__item">
                                            <span class="price-list__item-name" itemprop="makesOffer">
                                                    {{ $analysisItem['title'] }}
                                            </span>
                                            <span class="price-list__item-cost" itemprop="priceRange">
                                                {{ __date($analysisItem['date']) }}
                                            </span>

                                            <a href="{{ route('user.analysis.show', $analysisItem['id']) }}"
                                               class="price-list__item-btn btn btn-main">Просмотр</a>
                                        </div>
                                    @empty
                                        <x-alert>
                                            На данный момент у вас отсутствуют результаты анализов
                                        </x-alert>
                                    @endforelse

                                    {{ $analysis->links() }}

                                </div>

                            </section>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
