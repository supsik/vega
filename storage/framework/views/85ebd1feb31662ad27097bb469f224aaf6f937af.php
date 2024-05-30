<?php $__env->startSection('title', config("moonshine.title")); ?>

<?php $__env->startSection("header-inner"); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('header-inner'); ?>

    <?php echo $__env->make('moonshine::layouts.shared.breadcrumbs', [
        'items' => ['#' => __('moonshine::ui.dashboard')]
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if($blocks): ?>
        <div class="flex flex-col gap-y-8 gap-x-6 sm:grid sm:grid-cols-12 lg:gap-y-10">
            <?php $__currentLoopData = $blocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $block): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'moonshine::components.column','data' => ['colSpan' => $block->adaptiveColumnSpanValue(),'adaptiveColSpan' => $block->columnSpanValue()]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('moonshine::column'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['colSpan' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($block->adaptiveColumnSpanValue()),'adaptiveColSpan' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($block->columnSpanValue())]); ?>
                    <?php if($block->label()): ?>
                        <h2 class="mb-4 truncate text-md font-medium">
                            <?php echo e($block->label(), false); ?>

                        </h2>
                    <?php endif; ?>

                    <div class="flex flex-col gap-y-8 gap-x-6 sm:grid sm:grid-cols-12 lg:gap-y-10">
                        <?php $__currentLoopData = $block->items(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $block->render($item); ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make("moonshine::layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vendor/moonshine/moonshine/resources/views/dashboard.blade.php ENDPATH**/ ?>