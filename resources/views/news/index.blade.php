@extends('layouts.main')

@section('title', 'Новости - ' . config('app.name'))

@section('content')
    <div class="about-page">
        <div class="container-fluid">
            <div class="about-page__inner">

                <x-breadcrumbs>
                    <x-breadcrumbs.item isActive>Новости</x-breadcrumbs.item>
                </x-breadcrumbs>


                <section class="news section-top-space" itemscope itemtype="https://schema.org/NewsArticle">

                    <div class="row gy-4">

                        @foreach ($news as $newsItem)
                            <div class="col-12 col-sm-6 col-lg-4">
                                <x-news :link="route('news.show', $newsItem)">
                                    <x-slot:head>
                                        <x-news.thumbnail :url="$newsItem->getFirstMediaUrl('cover')" :title="$newsItem->title"></x-news.thumbnail>
                                        <x-news.date :value="$newsItem->published_at"></x-news.date>
                                    </x-slot:head>

                                    <x-slot:body>
                                        <x-news.title :value="$newsItem->title"></x-news.title>
                                        <x-news.excerpt :value="$newsItem->excerpt"></x-news.excerpt>
                                    </x-slot:body>
                                </x-news>
                            </div>
                        @endforeach

                    </div>
                </section>

                {{ $news->links() }}


            </div>
        </div>
    </div>
@endsection
