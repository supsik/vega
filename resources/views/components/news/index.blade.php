@props([
    'link',
])

<a href="{{ $link }}" class="news-card" itemprop="mainEntityOfPage" content="{{ $link }}">
    <div class="news-card__head">
        {{ $head }}
    </div>
    <div class="news-card__body">
        {{ $body }}
    </div>
</a>
