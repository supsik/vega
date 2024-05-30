@extends('layouts.main')

@section('title', $page->seo_title ?? 'О нас - ' . config('app.name'))
@section('description', $page->seo_description)
@section('keywords', $page->seo_keywords)

@section('content')
    <div class="about-page">
        <div class="container-fluid">
            <div class="about-page__inner">

                <x-breadcrumbs>
                    <h1 class="breadcrumb__heading">Клиника МЕГА</h1>
                </x-breadcrumbs>

                <section class="about-section section-top-space">
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
                            @if($page->first_block_text)
                                <div class="about-section__text pt-0">
                                    <div class="about-section__text-column">
                                        <h2 class="section-title about-section__title">Клиника МЕГА</h2>
                                        {!! $page->first_block_text !!}
                                    </div>
                                </div>
                            @endif
                        </div>

                    </div>
                </section>

                @if($page->youtube_link)
                    <section class="video-section section-top-space">
                        <a
                            class="video-section__preview"
                            href="{{ $page->youtube_link }}"
                            data-fancybox
                        >
                            <img class="video-section__image img-fluid"
                                 src="{{ youtube_preview_url($page->youtube_link) }}" alt="">
                        </a>
                    </section>
                @endif

                @if($page->second_block_text)
                    <section class="text-section section-top-space">
                        <h2 class="section-title">Наша клиника</h2>
                        {!! $page->second_block_text !!}
                    </section>
                @endif
            </div>
        </div>
    </div>
@endsection
