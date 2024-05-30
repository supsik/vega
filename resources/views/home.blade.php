
@extends('layouts.main')

@section('title', $page->seo_title ?? config('app.name'))
@section('description', $page->seo_description)
@section('keywords', $page->seo_keywords)

@section('content')
    @if($homeSlider->count())
        <section class="home-carousel">
            <div class="container-fluid">
                <div class="home-carousel__inner">
                    <div id="carousel-home" class="home-carousel__wrapper carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">

                            @foreach($homeSlider as $slide)
                                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                    <div class="home-carousel__item">
                                        <a class="home-carousel__bg" href="{{ $slide->link ?? 'javascript:void(0)' }}">
                                            <img class="home-carousel__bg-desktop"
                                                 src="{{ $slide->getFirstMediaUrl('desktop_image') }}"
                                                 alt="{{ $slide->title }}">
                                            <a class="home-carousel__bg home-carousel__bg-mobile"
                                               href="{{ $slide->link ?? 'javascript:void(0)' }}">
                                                <img
                                                    src="{{ $slide->getFirstMediaUrl('mobile_image') }}"
                                                    alt="{{ $slide->title }}">
                                            </a>
                                        </a>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                    @if($homeSlider->count() > 1)
                        <div class="carousel-control home-carousel__controls">
                            <button class="carousel-btn carousel-btn--prev home-carousel__prev-btn" type="button"
                                    data-bs-target="#carousel-home" data-bs-slide="prev"></button>
                            <button class="carousel-btn home-carousel__next-btn" type="button"
                                    data-bs-target="#carousel-home"
                                    data-bs-slide="next"></button>
                        </div>
                    @endif

                </div>
            </div>

        </section>

    @endif


    <section class="about-section section-top-space">
        <div class="container-fluid">
            <div class="row">

                <div class="col-12 col-sm-4 col-md-3">
                    @if($page->employee)
                        <x-person class="about-section__person person--link"
                                  :link="route('team.show', $page->employee)">
                            <x-slot:photo>
                                <x-person.photo :url="$page->employee->getFirstMediaUrl('photo')"
                                                :name="$page->employee->name"></x-person.photo>
                            </x-slot:photo>

                            <x-slot:info>
                                <x-person.name :value="$page->employee->name"></x-person.name>
                                <x-person.position :value="$page->employee->position->name"></x-person.position>
                            </x-slot:info>
                        </x-person>
                    @endif
                </div>


                <div class="col-12 col-sm-8 col-md-9">
                    @if($page->first_block_text || $page->second_block_text)
                        <div class="about-section__text about-section__text--dots">
                            <div class="about-section__text-column">
                                {!! $page->first_block_text !!}
                            </div>
                            <div class="about-section__text-column">
                                {!! $page->second_block_text !!}
                            </div>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </section>
    <section class = "services">
        <div class = "container-fluid">
            <h2 class = "services__h2">Услуги</h2>
            <div class="row gy-3 gy-3 gx-3 gy-lg-4 gx-lg-4">
            @if($diagnostics->count())
                @foreach ($diagnostics as $diagnostic)
                    <div class = "col-12 col-md-4 col-lg-3">
                        <a class="services-card"
                            href="{{ route('diagnostics.show', $diagnostic) }}"
                            data-animation ="{{ $diagnostic->getFirstMediaUrl('animation') }}"
                            >
                            @if($diagnostic->getFirstMediaUrl('animation'))
                                <canvas class="services-canvas" width="50" height="50"></canvas>
                            @endif
                            <div>
                                <p class = "services-card__name">{{ $diagnostic->name }}</p>
                                <p class = "services-card__description">{{ mb_strimwidth(
                                    strip_tags($diagnostic->description), 0, 80, "..."
                                ) }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
                @endif
            </div>
        </div>

    </section>

    <div onclick ="megaScroll.ScrollTop()" class ="g-btn-up">
        <svg width="62" height="62" viewBox="0 0 62 62" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="1.5" y="1.5" width="59" height="59" rx="14.5" fill="#E8F0D1" stroke="#A1BF3E" stroke-width="3"/>
            <path d="M15 37L30.5 25L46 37" stroke="#3C515C" stroke-width="3" stroke-linecap="round"/>
        </svg>
    </div>

    @if($reviews->count())
        <section class="text-carousel section-top-space">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="text-carousel__left">
                            <h2 class="text-carousel__title section-title">
                                Пациенты
                                <span>
                                    о нас
                                </span>
                            </h2>
                            @if($reviews->count() > 1)
                                <div class="text-carousel__controls">
                                    <button
                                        class="carousel-btn carousel-btn--prev text-carousel__prev-btn"
                                        type="button"
                                        data-bs-target="#carousel-comments"
                                        data-bs-slide="prev"
                                    ></button>
                                    <button
                                        class="carousel-btn text-carousel__next-btn"
                                        type="button"
                                        data-bs-target="#carousel-comments"
                                        data-bs-slide="next"
                                    ></button>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">

                        <div id="carousel-comments" class="text-carousel__wrapper carousel slide"
                             data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($reviews as $review)
                                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                        <div class="text-carousel__item">
                                            <h4 class="text-carousel__author">
                                                {{ $review->author }}
                                            </h4>
                                            <p class="text-carouser__text">
                                                {{ $review->text }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    @endif

    @if($news->count())
        <section class="news section-top-space">
            <div class="container-fluid">
                <h2 class="section-title">Новости клиники</h2>

                <div class="row gy-4">

                    @foreach($news as $newsItem)
                        <div class="col-12 col-sm-6 col-md-4" itemscope itemtype="https://schema.org/NewsArticle" >
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
            </div>
        </section>
    @endif
@endsection