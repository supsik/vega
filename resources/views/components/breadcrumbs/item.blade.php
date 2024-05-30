@props([
    'isActive' => false,
    'isLarge' => false,
    'isDark' => false,
    'link',
])

@if(!$isActive)
    <li class="breadcrumb__item">
        <a class="breadcrumb__link" href="{{ $link }}">{{ $slot }}</a>
        <span class="breadcrumb__slash">/</span>
    </li>
@else
    <li @class([
        'breadcrumb__item',
        'active',
        'breadcrumb__item--large' => $isLarge,
        'breadcrumb__item--dark' => $isDark,
    ])>
        {{ $slot }}
    </li>
@endif


