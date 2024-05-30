<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'searchable' => false,
    'nullable' => false,
    'values' => [],
    'options' => false,
    'asyncRoute' => null
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'searchable' => false,
    'nullable' => false,
    'values' => [],
    'options' => false,
    'asyncRoute' => null
]); ?>
<?php foreach (array_filter(([
    'searchable' => false,
    'nullable' => false,
    'values' => [],
    'options' => false,
    'asyncRoute' => null
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<select
        <?php echo e($attributes->merge([
            'class' => 'form-select',
            'x-data' => 'select(\''. $asyncRoute .'\')',
            'data-search-enabled' => $searchable,
            'data-remove-item-button' => $nullable
        ]), false); ?>

>
    <?php if($options ?? false): ?>
        <?php echo e($options, false); ?>

    <?php else: ?>
        <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(is_array($label)): ?>
                <optgroup label="<?php echo e($value, false); ?>">
                    <?php $__currentLoopData = $label; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oValue => $oName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php if($oValue == $attributes->get('value', '')): echo 'selected'; endif; ?>
                                value="<?php echo e($oValue, false); ?>"
                        >
                            <?php echo e($oName, false); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </optgroup>
            <?php else: ?>
                <option <?php if($value == $attributes->get('value', '')): echo 'selected'; endif; ?>
                        value="<?php echo e($value, false); ?>"
                >
                    <?php echo e($label, false); ?>

                </option>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</select>
<?php /**PATH /var/www/vendor/moonshine/moonshine/resources/views/components/form/select.blade.php ENDPATH**/ ?>