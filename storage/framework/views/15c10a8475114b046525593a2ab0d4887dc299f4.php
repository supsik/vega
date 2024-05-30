<div class="calc-result__item">
    <span class="calc-result__item-name">
        <?php echo e($analysis->name, false); ?>

    </span>
    <span class="calc-result__item-price">
        <?php echo e(price($analysis->price), false); ?>

    </span>
    <button wire:click="remove(<?php echo e($analysis->id, false); ?>)"
            class="calc-result__item-remove">&times;
    </button>
</div>
<?php /**PATH /var/www/resources/views/livewire/analysis/selected-item.blade.php ENDPATH**/ ?>