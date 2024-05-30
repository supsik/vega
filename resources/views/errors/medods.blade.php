@extends('layouts.main')

@section('title', 'Ошибка при загрузке данных')

@section('content')
    <div class="text-page">
        <div class="container-fluid">
            <div class="text-page__inner">

                <div class="text-page__content section-top-space text-center">
                    <h2 class="section-title h1">Произошла ошибка при загрузке данных.</h2>
                    <a class="btn btn-main btn-lg" href="{{ url(Request::getRequestUri()) }}">Обновить страницу</a>
                </div>
            </div>
        </div>
    </div>
@endsection
