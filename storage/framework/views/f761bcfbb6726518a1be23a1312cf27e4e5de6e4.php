<?php if($resource->hasMassAction()): ?>
    <th class="w-10 text-center">
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'moonshine::components.form.input','data' => ['type' => 'checkbox','@change' => 'actions(\'all\')','class' => 'actionsAllChecked','value' => '1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('moonshine::form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'checkbox','@change' => 'actions(\'all\')','class' => 'actionsAllChecked','value' => '1']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    </th>
<?php endif; ?>

<?php $__currentLoopData = $resource->getFields()->indexFields(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <th>
        <div class="flex items-baseline gap-x-1">
            <?php echo $field->label(); ?>


            <?php if(!$resource->isPreviewMode() && $field->isSortable()): ?>
                <a href="<?php echo e($field->sortQuery(), false); ?>" class="shrink-0" @click.prevent="canBeAsync">
                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" fill-opacity="<?php echo e($field->sortType('asc') && $field->sortActive() ? '1' : '.5', false); ?>" d="m11.47,4.72a0.75,0.75 0 0 1 1.06,0l3.75,3.75a0.75,0.75 0 0 1 -1.06,1.06l-3.22,-3.22l-3.22,3.22a0.75,0.75 0 0 1 -1.06,-1.06l3.75,-3.75z" clip-rule="evenodd"></path>
                        <path fill-rule="evenodd" fill-opacity="<?php echo e($field->sortType('desc') && $field->sortActive() ? '1' : '.5', false); ?>" d="m12.53,4.72zm-4.81,9.75a0.75,0.75 0 0 1 1.06,0l3.22,3.22l3.22,-3.22a0.75,0.75 0 1 1 1.06,1.06l-3.75,3.75a0.75,0.75 0 0 1 -1.06,0l-3.75,-3.75a0.75,0.75 0 0 1 0,-1.06z" clip-rule="evenodd"></path>
                    </svg>
                </a>
            <?php endif; ?>
        </div>
    </th>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php if(!$resource->isPreviewMode()): ?>
    <th></th>
<?php endif; ?>

<?php /**PATH /var/www/vendor/moonshine/moonshine/resources/views/crud/shared/table-head.blade.php ENDPATH**/ ?>