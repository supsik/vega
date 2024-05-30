<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'id',
    'label',
    'isError' => false,
    'errorMessage' => '',
    'required' => false
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'id',
    'label',
    'isError' => false,
    'errorMessage' => '',
    'required' => false
]); ?>
<?php foreach (array_filter(([
    'id',
    'label',
    'isError' => false,
    'errorMessage' => '',
    'required' => false
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="mb-3">
    <label class="contact-form__label form-label <?php echo e($required ? 'required' : '', false); ?>" for="<?php echo e($id, false); ?>"><?php echo e($label, false); ?></label>

    <input
        id="<?php echo e($id, false); ?>"
        <?php echo e($attributes->class(['form-control', $isError ? 'is-invalid' : '']), false); ?>

        <?php echo e($attributes, false); ?>

    >
    <div class = "error-message"></div>
</div>
<?php /**PATH /var/www/resources/views/components/form/input.blade.php ENDPATH**/ ?>