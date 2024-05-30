@extends('layouts.main')

@section('title', $doctor->seo_title ?? $doctor->full_name . ' - МегаДоктора - ' . config('app.name'))
@section('description', $doctor->seo_description ?? '')
@section('keywords', $doctor->seo_keywords)

@section('content')
    <div class="employee-page">
        <div class="container-fluid">
            <div class="employee-page__inner">

                <div class="row" >
                    <div class="col-12 col-md-7">
                        <nav class="breadcrumb">
                            <x-breadcrumbs>
                                <x-breadcrumbs.item link="{{ route('doctors.index') }}">МегаДоктора</x-breadcrumbs.item>
                                <h1 class="breadcrumb__heading" itemprop = "employee">{{ $doctor->full_name }}</h1>
                            </x-breadcrumbs>
                        </nav>

                        <div class="employee-page__position" itemprop = "medicalSpecialty">
                            {{ $doctor->specialitiesList }}
                        </div>

                        @if($doctor->price)
                            <div class="employee-page__price"itemprop="name" content="Консультация" >
                                Стоимость консультации <strong itemprop="priceRange">{{ price($doctor->price) }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="col-12 col-md-5">
                        <div class="employee-page__photo">
                            <img src="{{ $doctor->getFirstMediaUrl('photo') }}" alt ="{{ $doctor->full_name }} {{ $doctor->specialitiesList }}">
                        </div>
                    </div>
                </div>

                <div class="row pt-4">
                    <div class="col-12 col-lg-7 order-2 order-lg-1">
                        <div class="employee-page__text">
                            {!! $doctor->description !!}
                        </div>

                        <livewire:form.review :name="$doctor->full_name"/>
                    </div>

                    <div class="col-12 col-lg-5 order-1 order-lg-2">

                        @if(count($firstSchedule))
                            <livewire:schedule
                                title="Запись в Клинику МЕГА на Доватора 22"
                                :clinicId="1"
                                :schedule="$firstSchedule"
                                :doctor="$doctor"></livewire:schedule>
                        @endif

                        @if(count($secondSchedule))
                            <livewire:schedule
                                title="Запись в Клинику МЕГА на Весенней 7А"
                                :clinicId="4"
                                :schedule="$secondSchedule"
                                :doctor="$doctor"></livewire:schedule>
                        @endif

                        @if(!count($firstSchedule) && !count($secondSchedule))
                        <span class="accordion-button__schedule-full">
                        К сожалению, на ближайшую неделю запись к доктору полная.
										Пожалуйста, позвоните в колл-центр 8(8672)40-41-30,
										наши операторы подберут для Вас другое удобное время или включат в лист ожидания.
                        </span>
                        @endif

                    </div>

                </div>
            </div>


        </div>
    </div>
    </div>
@endsection
