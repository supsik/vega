@extends('layouts.main')
@section('title', ' Хирургическое отделение - ' . config('app.name'))
{{-- @section('description', $operations->seo_description)
@section('keywords', $operations->seo_keywords) --}}

@section('content')
    <div class="diagnostics-page">
        <div class="container-fluid">
            <div class="diagnostics-page__inner">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <x-breadcrumbs>
                            <x-breadcrumbs.item link="/operations-blocks">Хирургическое отделение</x-breadcrumbs.item>
                            <h1 class="breadcrumb__heading">Хирургическое отделение</h1>
                        </x-breadcrumbs>
                    </div>
                </div>
                <div class="row section-top-space">
                    <div class="col-12 col-md-7">
                        <div class="diagnostics-page__text">
                            {!! $moonPageContent !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-5">
                        @if ($directions->count())
                            <section class="specialists-section">
                                <h3 class="specialists-section__title section-title">
                                    Направления
                                </h3>
                                <div class="specialists-section__list">
                                    @foreach ($directions->sortBy('order') as $direction)
                                        <a class="person person--link doctors__person"
                                            href="{{ route('operations.index', $direction->slug) }}">
                                            <img class="person__photo img-fluid"
                                                src="{{ $direction->getFirstMediaUrl('cover') }}"
                                                alt="{{ $direction->name }}">
                                            <div class="person__info">
                                                <h4 class="person__name" itemprop = "employee" >
                                                    {{ $direction->name }}
                                                </h4>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </section>
                        @endif
                    </div>
                </div>
                <livewire:operations-filter> </livewire:operations-filter>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
