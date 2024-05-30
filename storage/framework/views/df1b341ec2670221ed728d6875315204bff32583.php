<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'item'
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'item'
]); ?>
<?php foreach (array_filter(([
    'item'
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php if($item instanceof MoonShine\Menu\MenuDivider): ?>
    <li class="menu-inner-divider">
        <?php echo $item->label() ? "<span>{$item->label()}</span>" : ''; ?>

    </li>
<?php else: ?>
    <li class="menu-inner-item <?php echo e($item->isActive() ? '_is-active' : '', false); ?>">
        <a href="<?php echo e($item->url(), false); ?>" class="menu-inner-link" x-data="navTooltip" @mouseenter="toggleTooltip()">
            <?php echo $item->getIcon(6); ?>


            <span class="menu-inner-text"><?php echo e($item->label(), false); ?></span>

            <?php if($item->hasBadge()): ?>
                <span class="menu-inner-counter"><?php echo e($item->getBadge(), false); ?></span>
            <?php endif; ?>
        </a>
    </li>
<?php endif; ?>
<?php /**PATH /var/www/vendor/moonshine/moonshine/resources/views/components/menu/item.blade.php ENDPATH**/ ?>