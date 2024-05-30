@props([
    'link',
])

<a {{ $attributes->class('person') }} href="{{ $link }}">
    {{ $photo }}

    <div class="person__info">
        {{ $info }}
    </div>
</a>
