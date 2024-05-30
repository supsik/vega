@extends('layouts.main')

@section('title', $diagnostics->seo_title ?? $diagnostics->name .  ' - Диагностики - ' .  config('app.name'))
@section('description', $diagnostics->seo_description)
@section('keywords', $diagnostics->seo_keywords)

@section('content')
    <div class="diagnostics-page">
        <div class="container-fluid">
            <div class="diagnostics-page__inner">

                <div class="row">
                    <div class="col-12 col-md-5">
                        <x-breadcrumbs>
                            <x-breadcrumbs.item link="javascript:void(0)">Диагностика</x-breadcrumbs.item>
                            <h1 class="breadcrumb__heading">{{ $diagnostics->name }}</h1>
                        </x-breadcrumbs>
                    </div>

                    <div class="col-12 col-md-7">
                        <div class="diagnostics-page__photo">
                            <img class="img-fluid" src="{{ $diagnostics->getFirstMediaUrl('cover') }}">
                        </div>
                    </div>
                </div>

                <div class="row section-top-space">
                    <div class="col-12 col-md-7">
                        @if($diagnostics->description)
                            <div class="diagnostics-page__text">
                                {!! $diagnostics->description !!}
                            </div>
                        @endif
                    </div>


                    <div class="col-12 col-md-5">
                        @if($diagnostics->doctors->count())

                            <section class="specialists-section">

                                <h3 class="specialists-section__title section-title">
                                    Специалисты
                                </h3>

                                <div class="specialists-section__list">
                                    @foreach ($diagnostics->doctors->sortBy('fullName') as $doctor)
                                        <a class="person person--link doctors__person"
                                           href="{{ route('doctors.show', $doctor) }}">
                                            <img
                                                class="person__photo img-fluid"
                                                src="{{ $doctor->getFirstMediaUrl('photo') }}"
                                                alt="{{ $doctor->full_name }}"
                                            >
                                            <div class="person__info">
                                                <h4 class="person__name" itemprop = "employee">
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

                <livewire:services-filter :diagnosticsId="$diagnostics->id"></livewire:services-filter>

            </div>
        </div>
    </div>
@endsection
