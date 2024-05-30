<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'label',
    'isError' => false,
    'errorMessage' => '',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'label',
    'isError' => false,
    'errorMessage' => '',
]); ?>
<?php foreach (array_filter(([
    'label',
    'isError' => false,
    'errorMessage' => '',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php ($id = uniqid('form')); ?>

<div class="mb-3">
    <label class="contact-form__label form-label required" for="<?php echo e($id, false); ?>"><?php echo e($label, false); ?></label>

    <textarea
        id="<?php echo e($id, false); ?>"
        <?php echo e($attributes->class(['form-control', $isError ? 'is-invalid' : '']), false); ?>

        <?php echo e($attributes, false); ?>

    ></textarea>

    <?php if($isError): ?>
        <div class="invalid-feedback">
            <?php echo e($errorMessage, false); ?>

        </div>
    <?php endif; ?>
</div>
<?php /**PATH /var/www/resources/views/components/form/textarea.blade.php ENDPATH**/ ?>