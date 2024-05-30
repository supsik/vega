<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'link',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'link',
]); ?>
<?php foreach (array_filter(([
    'link',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<a <?php echo e($attributes->class('person'), false); ?> href="<?php echo e($link, false); ?>">
    <?php echo e($photo, false); ?>


    <div class="person__info">
        <?php echo e($info, false); ?>

    </div>
</a>
<?php /**PATH /var/www/resources/views/components/person/index.blade.php ENDPATH**/ ?>