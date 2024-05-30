@props([
    'url',
    'title',
])

<img
    class="news-card__image img-fluid"
    itemprop="url image"
    content="{{ $url }}"
    loading="lazy"
    src="{{ $url }}"
    alt="{{ $title }}"
>
