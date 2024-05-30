
<div class="price-list__item">

    <span class="price-list__item-name" itemprop="makesOffer">
        <?php echo e($analysis->name, false); ?>

    </span>
    <span class="price-list__item-period">
        <?php echo e($analysis->period, false); ?>

    </span>
    <span class="price-list__item-cost" itemprop="priceRange">
        <?php echo e(price($analysis->price), false); ?>

    </span>
    <?php if($selected): ?>
        <button wire:click="remove(<?php echo e($analysis->id, false); ?>)"
                class="price-list__item-btn btn btn-danger">Удалить
        </button>
    <?php else: ?>
        <button wire:click="add(<?php echo e($analysis->id, false); ?>)"
                class="price-list__item-btn btn btn-main">Добавить
        </button>
    <?php endif; ?>
</div>
<?php /**PATH /var/www/resources/views/livewire/analysis/list-item.blade.php ENDPATH**/ ?>