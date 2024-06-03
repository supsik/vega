@extends('layouts.main')

@section('title', $speciality->seo_title ??  $speciality->plural_name . ' - VegaДоктора - ' . config('app.name'))
@section('description', $speciality->seo_description)
@section('keywords', $speciality->seo_keywords)

@section('content')
    <div class="doctors-page">
        <div class="container-fluid">
            <div class="doctors-page__inner">

                <x-breadcrumbs>
                    <x-breadcrumbs.item link="{{ route('doctors.index') }}">VegaДоктора</x-breadcrumbs.item>
                    <x-breadcrumbs.item isActive>{{ $speciality->plural_name }}</x-breadcrumbs.item>
                </x-breadcrumbs>

                <div class="row section-top-space">
                    <div class="col-12 col-md-7">
                        @if($speciality->description)
                            <div class="diagnostics-page__text">
                                {!! $speciality->description !!}
                            </div>
                        @endif
                    </div>


                    <div class="col-12 col-md-5">
                        @if($speciality->doctors->count())
                            <section class="specialists-section">
                                <h3 class="specialists-section__title section-title">
                                    Специалисты
                                </h3>

                                <div class="specialists-section__list">
                                    @foreach($speciality->doctors as $doctor)
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
