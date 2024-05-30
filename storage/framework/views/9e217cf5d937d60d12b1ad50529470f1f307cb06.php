<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'url',
    'name',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'url',
    'name',
]); ?>
<?php foreach (array_filter(([
    'url',
    'name',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<img
    class="person__photo img-fluid"
    src="<?php echo e($url, false); ?>"
    alt="<?php echo e($name, false); ?>"
>
<?php /**PATH /var/www/resources/views/components/person/photo.blade.php ENDPATH**/ ?>