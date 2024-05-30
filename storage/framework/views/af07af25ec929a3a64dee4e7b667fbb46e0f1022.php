<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'adaptiveColSpan' => 12,
    'colSpan' => 12,
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'adaptiveColSpan' => 12,
    'colSpan' => 12,
]); ?>
<?php foreach (array_filter(([
    'adaptiveColSpan' => 12,
    'colSpan' => 12,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<div
    <?php echo e($attributes->class(['space-y-6', "col-span-$adaptiveColSpan", "xl:col-span-$colSpan"]), false); ?>

>
    <?php echo e($slot, false); ?>

</div>
<?php /**PATH /var/www/vendor/moonshine/moonshine/resources/views/components/column.blade.php ENDPATH**/ ?>