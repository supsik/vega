<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['id']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['id']); ?>
<?php foreach (array_filter((['id']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="schedule-carousel__controls">
    <button
        class="carousel-btn carousel-btn--prev schedule-carousel__prev-btn"
        type="button"
        data-bs-target="#<?php echo e($id, false); ?>"
        data-bs-slide="prev"
    ></button>
    <button
        class="carousel-btn schedule-carousel__next-btn"
        type="button"
        data-bs-target="#<?php echo e($id, false); ?>"
        data-bs-slide="next"
    ></button>
</div>
<?php /**PATH /var/www/resources/views/components/schedule/slider-navigation.blade.php ENDPATH**/ ?>