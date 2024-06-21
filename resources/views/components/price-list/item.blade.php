@props([
    'name',
    'price',
    'link' => '#',
    'isDisabled' => false,
    'href'
])


<div class="price-list__item">

    <span class="price-list__item-name" itemprop="makesOffer">
        @if(isset($href) && $href != '')
            <a class="breadcrumb__link" href="{{ $href }}">
                {{ $name }}
            </a>
        @else
            {{ $name }}
        @endif
    </span>

    <span class="price-list__item-cost" itemprop="priceRange">
        {{ price($price) }}
    </span>
    @if($isDisabled)
        <span class="price-list__item-disable" itemprop="description">
            {{ $variables->service_disable_text }}
        </span>
    @elseif($link!= '#')
        <a class="price-list__item-btn btn btn-main" href="{{ $link }}">Записаться</a>
    @else
        <span class="price-list__item-disable" itemprop="telephone" content ="8 (9094) 76-50-69">Запись по телефону 8 (9094) 76-50-69</span>
    @endif
</div>

