<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'title' => false,
    'dark' => false
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'title' => false,
    'dark' => false
]); ?>
<?php foreach (array_filter(([
    'title' => false,
    'dark' => false
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<div <?php echo e($attributes->class(['box', 'box-dark' => $dark]), false); ?>>
    <?php if($title ?? false): ?> <h2 class="box-title"><?php echo e($title, false); ?></h2> <?php endif; ?>

    <?php echo e($slot, false); ?>

</div>
<?php /**PATH /var/www/vendor/moonshine/moonshine/resources/views/components/box.blade.php ENDPATH**/ ?>