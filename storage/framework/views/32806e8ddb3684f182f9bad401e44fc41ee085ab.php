<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'placement' => 'bottom-start',
    'toggler',
    'title',
    'footer'
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'placement' => 'bottom-start',
    'toggler',
    'title',
    'footer'
]); ?>
<?php foreach (array_filter(([
    'placement' => 'bottom-start',
    'toggler',
    'title',
    'footer'
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<div x-data="dropdown"
     @click.outside="closeDropdown"
     data-dropdown-placement="<?php echo e($placement, false); ?>"
     class="dropdown"
>
    <button type="button" @click.prevent="toggleDropdown" <?php echo e($toggler->attributes->merge(['class' => 'dropdown-btn']), false); ?>>
        <?php echo e($toggler, false); ?>

    </button>

    <div <?php echo e($attributes->merge(['class' => 'dropdown-body']), false); ?>>
        <?php if($title ?? false): ?>
            <h5 class="dropdown-heading"><?php echo e($title, false); ?></h5>
        <?php endif; ?>

        <div class="dropdown-content">
            <?php echo e($slot, false); ?>

        </div>

        <?php if($footer ?? false): ?>
            <div class="dropdown-footer">
                <?php echo e($footer ?? '', false); ?>

            </div>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH /var/www/vendor/moonshine/moonshine/resources/views/components/dropdown.blade.php ENDPATH**/ ?>