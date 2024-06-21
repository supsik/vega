@extends('layouts.main')

@section('title', 'Поиск - ' . config('app.name'))

@section('content')
    <div class="search-page">
        <div class="container-fluid">
            <div class="search-page__inner">

                <x-breadcrumbs>
                    <x-breadcrumbs.item link="javascript:void(0)">Поиск</x-breadcrumbs.item>
                    <x-breadcrumbs.item isActive>{{ request()->query('q') }}</x-breadcrumbs.item>
                </x-breadcrumbs>


                @if($services->count())
                    <section class="price-list mb-0 section-top-space">
                        <h3 class="section-title">
                            Услуги
                        </h3>
                        <div class="price-list__wrapper">
                            @foreach($services as $service)
                                <div class="price-list__item" >
                                    <span class="price-list__item-name" itemprop="makesOffer">
                                        {{ $service->title }}
                                    </span>
                                        <span class="price-list__item-cost" itemprop="priceRange">
                                        {{ price($service->price) }}
                                    </span>
                                    @if($service->is_disabled)
                                        <span class="price-list__item-disable" itemprop="telephone" content ="8 (9094) 76-50-69">{{ $variables->service_disable_text }}</span>
                                    @else
                                        <a class="price-list__item-btn btn btn-main"
                                           href="{{ route('appointment.index', ['serviceId' => $service->id]) }}">Записаться</a>
                                    @endif
                               </div>
                            @endforeach

                        </div>
                    </section>
                @endif

                @if($doctors->count())
                    <section id="1" class="doctors-section section-top-space">
                        <h3 class="section-title">
                            Врачи
                        </h3>

                        <div class="doctors-section__list">

                            @foreach($doctors as $doctor)
                                <x-person class="person--link doctors__person" :link="route('doctors.show', $doctor)">
                                    <x-slot:photo>
                                        <x-person.photo :url="$doctor->getFirstMediaUrl('photo')"
                                                        :name="$doctor->full_name"></x-person.photo>
                                    </x-slot:photo>

                                    <x-slot:info>
                                        <x-person.name :value="$doctor->full_name"></x-person.name>
                                        <x-person.position :value="$doctor->specialitiesList"></x-person.position>
                                    </x-slot:info>
                                </x-person>
                            @endforeach

                        </div>
                    </section>
                @endif

                @if($news->count())
                    <section class="news section-top-space" itemscope itemtype="https://schema.org/NewsArticle">

                        <h3 class="section-title">
                            Новости
                        </h3>

                        <div class="row gy-4">

                            @foreach($news as $newsItem)
                                <div class="col-12 col-sm-6 col-lg-4">
                                    <x-news :link="route('news.show', $newsItem)">
                                        <x-slot:head>
                                            <x-news.thumbnail :url="$newsItem->getFirstMediaUrl('cover')"
                                                              :title="$newsItem->title"></x-news.thumbnail>
                                            <x-news.date :value="$newsItem->published_at"></x-news.date>
                                        </x-slot:head>

                                        <x-slot:body>
                                            <x-news.title :value="$newsItem->title"></x-news.title>
                                            <x-news.excerpt :value="$newsItem->excerpt"></x-news.excerpt>
                                        </x-slot:body>
                                    </x-news>
                                </div>
                            @endforeach

                        </div>
                    </section>
                @endif

                @if($diagnostics->count())
                    <section class="news section-top-space">

                        <h3 class="section-title">
                            Диагностика
                        </h3>

                        <div class="row gy-4">

                            @foreach($diagnostics as $diagnostic)
                                <div class="col-12 col-sm-6 col-lg-4">
                                    <x-news :link="route('diagnostics.show', $diagnostic)">
                                        <x-slot:head>
                                            <x-news.thumbnail :url="$diagnostic->getFirstMediaUrl('cover')"
                                                              :title="$diagnostic->name"></x-news.thumbnail>
                                        </x-slot:head>

                                        <x-slot:body>
                                            <x-news.title :value="$diagnostic->name"></x-news.title>
                                        </x-slot:body>
                                    </x-news>
                                </div>
                            @endforeach

                        </div>
                    </section>
                @endif

            </div>
        </div>
    </div>
@endsection
