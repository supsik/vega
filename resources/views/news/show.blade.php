@extends('layouts.main')

@section('title', $news->seo_title ?? $news->title .  ' - Новости - ' . config('app.name'))
@section('description', $news->seo_description)
@section('keywords', $news->seo_keywords)

@section('content')
    <div class="news-show-page">
        <div class="container-fluid">

            <div class="news-show-page__inner" itemscope itemtype="https://schema.org/NewsArticle">
                <x-breadcrumbs>
                    <x-breadcrumbs.item link="{{ route('news.index') }}">Новости</x-breadcrumbs.item>
                    <h1 class="breadcrumb__heading dark" itemprop="headline name">{{ $news->title }}</h1>
                </x-breadcrumbs>

                <div class="news-show-page__content section-top-space">
                    <div class="row">
                        <div class="col-12 col-md-5">
                            <img class="news-show-page__image img-fluid" itemprop="url image" content="{{ $news->getFirstMediaUrl('cover') }}" src="{{ $news->getFirstMediaUrl('cover') }}">

                        </div>

                        <div class="col-12 col-md-7">
                            <div class="news-show-page__text">
                              {!! $news->content !!}
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
