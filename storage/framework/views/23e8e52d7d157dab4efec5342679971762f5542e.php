<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'isActive' => false,
    'isLarge' => false,
    'isDark' => false,
    'link',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'isActive' => false,
    'isLarge' => false,
    'isDark' => false,
    'link',
]); ?>
<?php foreach (array_filter(([
    'isActive' => false,
    'isLarge' => false,
    'isDark' => false,
    'link',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php if(!$isActive): ?>
    <li class="breadcrumb__item">
        <a class="breadcrumb__link" href="<?php echo e($link, false); ?>">⤺&nbsp;&nbsp;<?php echo e($slot, false); ?></a>
        <span class="breadcrumb__slash">|</span>
    </li>
<?php else: ?>
    <li class="<?php echo \Illuminate\Support\Arr::toCssClasses([
        'breadcrumb__item',
        'active',
        'breadcrumb__item--large' => $isLarge,
        'breadcrumb__item--dark' => $isDark,
    ]) ?>">
        <?php echo e($slot, false); ?>

    </li>
<?php endif; ?>


<?php /**PATH /var/www/resources/views/components/breadcrumbs/item.blade.php ENDPATH**/ ?>