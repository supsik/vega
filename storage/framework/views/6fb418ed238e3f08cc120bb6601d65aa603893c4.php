<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'value' => true
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'value' => true
]); ?>
<?php foreach (array_filter(([
    'value' => true
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<div <?php echo e($attributes->class(['h-2 w-2 rounded-full', 'bg-green-500' => $value, 'bg-red-500' => !$value]), false); ?>></div>
<?php /**PATH /var/www/vendor/moonshine/moonshine/resources/views/components/boolean.blade.php ENDPATH**/ ?>