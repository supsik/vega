<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'id',
    'label',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'id',
    'label',
]); ?>
<?php foreach (array_filter(([
    'id',
    'label',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="mb-3">
    <div class="form-check form-switch">
        <input id="<?php echo e($id, false); ?>" <?php echo e($attributes->merge(['class' => 'form-check-input']), false); ?> type="checkbox" value="1">
        <label class="form-check-label" for="<?php echo e($id, false); ?>"><?php echo e($label, false); ?></label>
    </div>
</div>

<?php /**PATH /var/www/resources/views/components/form/switch.blade.php ENDPATH**/ ?>