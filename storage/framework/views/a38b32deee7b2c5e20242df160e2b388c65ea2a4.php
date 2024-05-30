<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'left' => false,
    'title' => '',
    'toggler'
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'left' => false,
    'title' => '',
    'toggler'
]); ?>
<?php foreach (array_filter(([
    'left' => false,
    'title' => '',
    'toggler'
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<div x-data="offcanvas">
    <button type="button" @click.prevent="toggleCanvas" <?php echo e($toggler->attributes->merge(['class' => 'btn']), false); ?>>
        <?php echo e($toggler, false); ?>

    </button>

    <template x-teleport="body">
        <div class="offcanvas-template">
            <div
                x-show="open"
                x-bind="dismissCanvas"
                <?php if($left): ?>
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 -translate-x-full"
                    x-transition:enter-end="opacity-100 translate-x-0"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 translate-x-0"
                    x-transition:leave-end="opacity-0 -translate-x-full"
                <?php else: ?>
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-x-full"
                    x-transition:enter-end="opacity-100 translate-x-0"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 translate-x-0"
                    x-transition:leave-end="opacity-0 translate-x-full"
                <?php endif; ?>
                class="offcanvas offcanvas-<?php echo e($left ? 'left' : 'right', false); ?>"
                aria-modal="true"
                role="dialog"
            >
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title"><?php echo e($title, false); ?></h5>
                    <button type="button" class="btn btn-close" @click.prevent="toggleCanvas" aria-label="Close">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'moonshine::components.icon','data' => ['icon' => 'heroicons.x-mark']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('moonshine::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'heroicons.x-mark']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </button>
                </div>
                <div class="offcanvas-body">
                    <?php echo e($slot, false); ?>

                </div>
            </div>
            <div x-show="open" x-transition.opacity class="offcanvas-backdrop"></div>
        </div>
    </template>
</div>
<?php /**PATH /var/www/vendor/moonshine/moonshine/resources/views/components/offcanvas.blade.php ENDPATH**/ ?>