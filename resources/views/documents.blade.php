@extends('layouts.main')

@section('title', 'Лицензии и сертификаты - ' . config('app.name'))

@section('content')
    <div class="documents-page">
        <div class="container-fluid">
            <div class="documents-page__inner">

                <x-breadcrumbs>
                    <x-breadcrumbs.item isActive isLarge>Лицензии и сертификаты</x-breadcrumbs.item>
                </x-breadcrumbs>

               <section class="documents-section section-top-space">
                    <div class="row gy-4">

                        @foreach($documents as $document)
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                <a
                                    class="documents-section__item"
                                    href="{{ $document->getFirstMediaUrl('cover') }}"
                                    data-fancybox="documents "
                                >
                                    <img
                                        class="documents-section__image img-fluid"
                                        src="{{ $document->getFirstMediaUrl('cover') }}"
                                        alt=""
                                    >
                                </a>
                            </div>
                        @endforeach

                    </div>
               </section>

            </div>
        </div>
    </div>
@endsection
