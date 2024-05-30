<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'value' => null,
    'values' => null,
    'alt' => ''
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'value' => null,
    'values' => null,
    'alt' => ''
]); ?>
<?php foreach (array_filter(([
    'value' => null,
    'values' => null,
    'alt' => ''
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php if($value): ?>
    <div class="flex">
        <div class="zoom-in h-10 w-10 overflow-hidden rounded-md">
            <img <?php echo e($attributes->merge(['class' => 'h-full w-full object-cover cursor-zoom-in']), false); ?>

                 src="<?php echo e($value, false); ?>"
                 alt="<?php echo e($alt, false); ?>"
                 @click.stop="$dispatch('img-popup', {open: true, src: '<?php echo e($value, false); ?>' })"
            >
        </div>
    </div>
<?php elseif($values): ?>
    <div class="images-row">
        <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="zoom-in images-row-item">
                <img <?php echo e($attributes->merge(['class' => 'h-full w-full object-cover cursor-zoom-in']), false); ?>

                     src="<?php echo e($value, false); ?>"
                     alt="<?php echo e($alt, false); ?>"
                     @click.stop="$dispatch('img-popup', {open: true, src: '<?php echo e($value, false); ?>' })"
                />
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>

<?php /**PATH /var/www/vendor/moonshine/moonshine/resources/views/components/thumbnails.blade.php ENDPATH**/ ?>