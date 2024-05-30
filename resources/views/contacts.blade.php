@extends('layouts.main')

@section('title', $page->seo_title ?? 'Контакты - ' . config('app.name'))
@section('description', $page->seo_description)
@section('keywords', $page->seo_keywords)

@section('content')
    <div class="contacts-page">
        <div class="container-fluid">
            <div class="contacts-page__inner">

                <x-breadcrumbs>
                    <x-breadcrumbs.item isActive isDark>Контакты</x-breadcrumbs.item>
                </x-breadcrumbs>

            </div>

            <section class="contacts-section section-top-space">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="contacts-section__info">
                            {!! $page->first_block_text !!}
                        </div>
                    </div>

                    <div class="col-12 col-md-6">

                        <livewire:form.contact/>

                    </div>

                </div>
            </section>
        </div>
    </div>
@endsection
