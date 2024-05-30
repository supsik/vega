@extends('layouts.main')

@section('title', $operations->seo_title ?? $operations->name .  ' - Хирургическое отделение - ' .  config('app.name'))
@section('description', $operations->seo_description)
@section('keywords', $operations->seo_keywords)

@section('content')
    <div class="diagnostics-page">
        <div class="container-fluid">
            <div class="diagnostics-page__inner">

                <div class="row">
                    <div class="col-12 col-md-5">
                        <x-breadcrumbs>
                            <x-breadcrumbs.item link="/operations-blocks">Хирургическое отделение</x-breadcrumbs.item>
                            <h1 class="breadcrumb__heading">{{ $operations->name }}</h1>
                        </x-breadcrumbs>
                        @if($operations->price)
                            <br>
                            <div class="employee-page__price">
                                Стоимость операции <strong>{{ price($operations->price) }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="col-12 col-md-7">
                        <div class="diagnostics-page__photo">
                            <img class="img-fluid" src="{{ $operations->getFirstMediaUrl('cover') }}">
                        </div>
                    </div>
                </div>

                <div class="row section-top-space">
                    <div class="col-12 col-md-7">
                        @if($operations->description)
                            <div class="diagnostics-page__text">
                                {!! $operations->description !!}
                            </div>
                        @endif
                    </div>


                    <div class="col-12 col-md-5">
                        @if($operations->doctors->count())
                            <section class="specialists-section">
                                <h3 class="specialists-section__title section-title">
                                    Специалисты
                                </h3>

                                <div class="specialists-section__list">
                                    @foreach ($operations->doctors->sortBy('fullName') as $doctor)
                                        <a class="person person--link doctors__person"
                                           href="{{ route('doctors.show', $doctor) }}">
                                            <img
                                                class="person__photo img-fluid"
                                                src="{{ $doctor->getFirstMediaUrl('photo') }}"
                                                alt="{{ $doctor->full_name }}"
                                            >
                                            <div class="person__info">
                                                <h4 class="person__name" itemprop = "employee" >
                                                    {{ $doctor->full_name }}
                                                </h4>
                                                <span class="person__position" itemprop = "medicalSpecialty">
                                                {{ $doctor->specialitiesList }}
                                            </span>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </section>
                        @endif

                    </div>

                </div>


            </div>
        </div>
    </div>
@endsection
