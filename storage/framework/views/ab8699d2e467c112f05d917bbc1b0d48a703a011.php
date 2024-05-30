<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'link',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'link',
]); ?>
<?php foreach (array_filter(([
    'link',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<a href="<?php echo e($link, false); ?>" class="news-card" itemprop="mainEntityOfPage" content="<?php echo e($link, false); ?>">
    <div class="news-card__head">
        <?php echo e($head, false); ?>

    </div>
    <div class="news-card__body">
        <?php echo e($body, false); ?>

    </div>
</a>
<?php /**PATH /var/www/resources/views/components/news/index.blade.php ENDPATH**/ ?>