<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['extension']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['extension']); ?>
<?php foreach (array_filter((['extension']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<span <?php echo e($attributes->class(['expansion']), false); ?>><?php echo e($extension->getValue(), false); ?></span>
<?php /**PATH /var/www/vendor/moonshine/moonshine/resources/views/components/form/input-extensions/ext.blade.php ENDPATH**/ ?>