
<div class="price-list__item">

    <span class="price-list__item-name" itemprop="makesOffer">
        {{ $analysis->name }}
    </span>
    <span class="price-list__item-period">
        {{ $analysis->period }}
    </span>
    <span class="price-list__item-cost" itemprop="priceRange">
        {{ price($analysis->price) }}
    </span>
    @if($selected)
        <button wire:click="remove({{ $analysis->id }})"
                class="price-list__item-btn btn btn-danger">Удалить
        </button>
    @else
        <button wire:click="add({{ $analysis->id }})"
                class="price-list__item-btn btn btn-main">Добавить
        </button>
    @endif
</div>
