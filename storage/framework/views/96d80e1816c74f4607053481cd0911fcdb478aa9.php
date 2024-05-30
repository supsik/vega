<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'icon' => '',
    'size' => 5,
    'color',
    'class' => ''
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'icon' => '',
    'size' => 5,
    'color',
    'class' => ''
]); ?>
<?php foreach (array_filter(([
    'icon' => '',
    'size' => 5,
    'color',
    'class' => ''
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php echo $__env->renderWhen($icon, "moonshine::ui.icons.$icon", array_merge([
    'size' => $size,
    'class' => $class
], isset($color) ? ['color' => $color] : []), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?><?php /**PATH /var/www/vendor/moonshine/moonshine/resources/views/components/icon.blade.php ENDPATH**/ ?>