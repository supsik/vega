<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'color' => 'main',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'color' => 'main',
]); ?>
<?php foreach (array_filter(([
    'color' => 'main',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>



<div class="mb-3">
    <button <?php echo e($attributes->class(["contact-form__submit btn btn-{$color}"]), false); ?>>
        <?php echo e($slot, false); ?>

    </button>
</div>
<?php /**PATH /var/www/resources/views/components/form/button.blade.php ENDPATH**/ ?>