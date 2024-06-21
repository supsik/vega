@extends('layouts.main')

@section('title', $employee->seo_title ?? $employee->name . '- Управление клиникой - ' . config('app.name'))
@section('description', $employee->seo_description)
@section('keywords', $employee->seo_keywords)

@section('content')
    <div class="employee-page">
        <div class="container-fluid">
            <div class="employee-page__inner">


                <div class="row">
                    <div class="col-12 col-md-7">

                        <x-breadcrumbs>
                            <x-breadcrumbs.item link="{{ route('team.index') }}">Управление клиникой
                            </x-breadcrumbs.item>
                            <x-breadcrumbs.item isActive isLarge>{{ $employee->name }}</x-breadcrumbs.item>
                        </x-breadcrumbs>

                        @if($employee->position)
                            <div class="employee-page__position">
                                {{ $employee->position->name }}
                            </div>
                        @endif
                    </div>

                    <div class="col-12 col-md-5">
                        <div class="employee-page__photo">
                            <img src="{{ $employee->getFirstMediaUrl('photo') }}" alt ="{{ $employee->full_name }} {{ $employee->specialitiesList }}">
                        </div>
                    </div>
                </div>

                <div class="row pt-4">
                    <div class="col-md-10">
                        <div class="employee-page__text mt-0">
                            {!! $employee->description !!}
                        </div>
                    </div>

                    <div class="col-md-10">

                        <livewire:form.review :name="$employee->name"/>

                    </div>

                </div>


            </div>
        </div>
    </div>
@endsection
