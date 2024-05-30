@extends('layouts.main')

@section('title', $page->seo_title ?? $page->title . ' - ' . config('app.name'))
@section('description', $page->seo_description)
@section('keywords', $page->seo_keywords)

@section('content')
<div class="text-page">
    <div class="container-fluid">
        <div class="text-page__inner">

            <x-breadcrumbs>
                <x-breadcrumbs.item isActive isDark>{{ $page->title }}</x-breadcrumbs.item>
            </x-breadcrumbs>

            <div class="text-page__content section-top-space">
                {!! $page->content !!}
            </div>
        </div>
    </div>
</div>
@endsection
