@props([
    'value',
])

<span class="news-card__date" itemprop="sdDatePublished" content="{{ $value }}" >
    {{ __date($value) }} 
</span>
