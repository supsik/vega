<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'id',
    'fields' => [],
    'label',
    'value',
    'isError' => false,
    'errorMessage' => '',
    'required' => false,
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'id',
    'fields' => [],
    'label',
    'value',
    'isError' => false,
    'errorMessage' => '',
    'required' => false,
]); ?>
<?php foreach (array_filter(([
    'id',
    'fields' => [],
    'label',
    'value',
    'isError' => false,
    'errorMessage' => '',
    'required' => false,
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

    <select id="<?php echo e($id, false); ?>" <?php echo e($attributes->class(['form-select', 'is-invalid' => $isError]), false); ?>>
        <option value="" selected>Не выбрано</option>

        <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionName => $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($optionValue, false); ?>" <?php if($optionValue === $value): echo 'selected'; endif; ?>><?php echo e($optionName, false); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>

    <?php if($isError): ?>
        <div class="invalid-feedback">
            <?php echo e($errorMessage, false); ?>

        </div>
    <?php endif; ?>
</div>
<?php /**PATH /var/www/resources/views/components/form/select.blade.php ENDPATH**/ ?>