@extends('layouts.main')

@section('title', 'Заключения - ' . config('app.name'))

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
                                    @forelse ($conclusions as $conclusion)
                                        <div class="price-list__item">
                                            <span class="price-list__item-name" itemprop="makesOffer">
                                                    {{ $conclusion['title'] }}
                                            </span>
                                            <span class="price-list__item-cost">
                                                {{ __date($conclusion['date']) }}
                                            </span>

                                            <a href="{{ route('user.conclusions.show', $conclusion['id']) }}"
                                               class="price-list__item-btn btn btn-main">Просмотр</a>
                                        </div>

                                    @empty
                                        <x-alert>
                                            На данный момент у вас отсутствуют результаты заключения
                                        </x-alert>
                                    @endforelse

                                    {{ $conclusions->links() }}
                                </div>
                            </section>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
