<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'simple' => false,
    'system' => false,
    'paginator',
    'elements' => []
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'simple' => false,
    'system' => false,
    'paginator',
    'elements' => []
]); ?>
<?php foreach (array_filter(([
    'simple' => false,
    'system' => false,
    'paginator',
    'elements' => []
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php if($paginator->hasPages()): ?>
    <?php if($simple): ?>
        <ul class="pagination-list simple">
            
            <li>
                <?php if($paginator->onFirstPage()): ?>
                    <span class="pagination-simple disabled">
                        <?php echo __('moonshine::pagination.previous'); ?>

                    </span>
                <?php else: ?>
                    <a href="<?php echo e($paginator->previousPageUrl(), false); ?>"
                       <?php if($system): ?> @click.prevent="canBeAsync" <?php endif; ?>
                       class="pagination-simple"
                    >
                        <?php echo __('moonshine::pagination.previous'); ?>

                    </a>
                <?php endif; ?>
            </li>

            
            <li>
                <?php if($paginator->hasMorePages()): ?>
                    <a href="<?php echo e($paginator->nextPageUrl(), false); ?>"
                       <?php if($system): ?> @click.prevent="canBeAsync" <?php endif; ?>
                       class="pagination-simple"
                    >
                        <?php echo __('moonshine::pagination.next'); ?>

                    </a>
                <?php else: ?>
                    <span class="pagination-simple disabled">
                        <?php echo __('moonshine::pagination.next'); ?>

                    </span>
                <?php endif; ?>
            </li>
        </ul>
    <?php else: ?>
    <!-- Pagination -->
    <div class="pagination">
        <ul class="pagination-list">
            <?php if(!$paginator->onFirstPage()): ?>
                <li class="pagination-item">
                    <a href="<?php echo e($paginator->previousPageUrl(), false); ?>"
                       <?php if($system): ?> @click.prevent="canBeAsync" <?php endif; ?>
                       class="pagination-first"
                       title="<?php echo __('moonshine::pagination.previous'); ?>"
                    >
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'moonshine::components.icon','data' => ['icon' => 'heroicons.chevron-double-left','size' => '6']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('moonshine::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'heroicons.chevron-double-left','size' => '6']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </a>
                </li>
            <?php endif; ?>

            <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                <?php if(is_string($element)): ?>
                    <li class="pagination-item">
                        <span class="pagination-dots"><?php echo e($element, false); ?></span>
                    </li>
                <?php endif; ?>

                
                <?php if(is_array($element)): ?>
                    <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="pagination-item">
                            <a href="<?php echo e($url, false); ?>"
                               <?php if($system): ?> @click.prevent="canBeAsync" <?php endif; ?>
                               class="pagination-page
                               <?php if($page == $paginator->currentPage()): ?> _is-active <?php endif; ?>"
                            >
                                <?php echo e($page, false); ?>

                            </a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php if($paginator->hasMorePages()): ?>
                <li class="pagination-item">
                    <a href="<?php echo e($paginator->nextPageUrl(), false); ?>"
                       <?php if($system): ?> @click.prevent="canBeAsync" <?php endif; ?>
                       class="pagination-last"
                       title="<?php echo __('moonshine::pagination.next'); ?>"
                    >
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'moonshine::components.icon','data' => ['icon' => 'heroicons.chevron-double-right','size' => '6']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('moonshine::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'heroicons.chevron-double-right','size' => '6']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
        <div class="pagination-results">
            <?php echo __('moonshine::pagination.showing'); ?>

            <?php if($paginator->firstItem()): ?>
                <?php echo e($paginator->firstItem(), false); ?>

                <?php echo __('moonshine::pagination.to'); ?>

                <?php echo e($paginator->lastItem(), false); ?>

            <?php else: ?>
                <?php echo e($paginator->count(), false); ?>

            <?php endif; ?>
            <?php echo __('moonshine::pagination.of'); ?>

            <?php echo e($paginator->total(), false); ?>

            <?php echo __('moonshine::pagination.results'); ?>

        </div>
    </div>
    <!-- END: Pagination -->
    <?php endif; ?>
<?php endif; ?>
<?php /**PATH /var/www/vendor/moonshine/moonshine/resources/views/components/pagination.blade.php ENDPATH**/ ?>