<div class="calc-result__item">
    <span class="calc-result__item-name">
        {{ $analysis->name }}
    </span>
    <span class="calc-result__item-price">
        {{ price($analysis->price) }}
    </span>
    <button wire:click="remove({{ $analysis->id }})"
            class="calc-result__item-remove">&times;
    </button>
</div>
