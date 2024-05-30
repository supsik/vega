<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'link' => 'javascript:void(0)',
    'time',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'link' => 'javascript:void(0)',
    'time',
]); ?>
<?php foreach (array_filter(([
    'link' => 'javascript:void(0)',
    'time',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<a
    <?php echo e($attributes->merge(['class' => 'schedule-item schedule-carousel__el']), false); ?>

    href="<?php echo e($link, false); ?>"
>
    <span class="schedule-item__time">
        <?php echo e($time, false); ?>

    </span>
</a>
<?php /**PATH /var/www/resources/views/components/schedule/slider-element.blade.php ENDPATH**/ ?>