@props([
    'link' => 'javascript:void(0)',
    'time',
])

<a
    {{ $attributes->merge(['class' => 'schedule-item schedule-carousel__el']) }}
    href="{{ $link }}"
>
    <span class="schedule-item__time">
        {{ $time }}
    </span>
</a>
