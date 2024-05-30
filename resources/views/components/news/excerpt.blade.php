@props([
    'value',
])

<p class="news-card__excerpt" itemprop="description" content ="{{ $value }}">
    {{ $value }}
</p>
