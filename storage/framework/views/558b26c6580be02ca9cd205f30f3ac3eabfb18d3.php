<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'wide' => false,
    'open' => false,
    'auto' => false,
    'title' => '',
    'outerHtml' => ''
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'wide' => false,
    'open' => false,
    'auto' => false,
    'title' => '',
    'outerHtml' => ''
]); ?>
<?php foreach (array_filter(([
    'wide' => false,
    'open' => false,
    'auto' => false,
    'title' => '',
    'outerHtml' => ''
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<div x-data="modal(<?php echo e($open, false); ?>)">
    <template x-teleport="body">
    <div class="modal-template">
        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 -translate-y-10"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-10"
            class="modal"
            aria-modal="true"
            role="dialog"
            @click.self="open=false"
        >
            <div class="modal-dialog <?php if($wide): ?> modal-dialog-xl <?php elseif($auto): ?> modal-dialog-auto <?php endif; ?>" x-bind="dismissModal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo e($title ?? '', false); ?></h5>
                        <button type="button"
                                class="btn btn-close"
                                @click.stop="open=false"
                                aria-label="Close"
                        >
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'moonshine::components.icon','data' => ['icon' => 'heroicons.x-mark','size' => '6']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('moonshine::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'heroicons.x-mark','size' => '6']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo e($slot ?? '', false); ?>

                    </div>
                </div>
            </div>
        </div>
        <div x-show="open" x-transition.opacity class="modal-backdrop"></div>
    </div>
    </template>

    <?php echo e($outerHtml ?? '', false); ?>

</div>
<?php /**PATH /var/www/vendor/moonshine/moonshine/resources/views/components/modal.blade.php ENDPATH**/ ?>