<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'url',
    'title',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'url',
    'title',
]); ?>
<?php foreach (array_filter(([
    'url',
    'title',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<img
    class="news-card__image img-fluid"
    itemprop="url image"
    content="<?php echo e($url, false); ?>"
    loading="lazy"
    src="<?php echo e($url, false); ?>"
    alt="<?php echo e($title, false); ?>"
>
<?php /**PATH /var/www/resources/views/components/news/thumbnail.blade.php ENDPATH**/ ?>