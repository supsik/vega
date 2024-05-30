<?php $__currentLoopData = $resources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resourceItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr class="bgc-<?php echo e($resourceItem->trClass($resourceItem->getItem(), $loop->index), false); ?>" style="<?php echo e($resourceItem->trStyles($resourceItem->getItem(), $loop->index), false); ?>">
        <?php if($resource->hasMassAction()): ?>
            <td class="w-10 text-center bgc-<?php echo e($resourceItem->tdClass($resourceItem->getItem(), $loop->index, 0), false); ?>" style="<?php echo e($resourceItem->tdStyles($resourceItem->getItem(), $loop->index, 0), false); ?>">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'moonshine::components.form.input','data' => ['type' => 'checkbox','@change' => 'actions(\'row\')','name' => 'items['.e($resourceItem->getItem()->getKey(), false).']','class' => 'tableActionRow','value' => ''.e($resourceItem->getItem()->getKey(), false).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('moonshine::form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'checkbox','@change' => 'actions(\'row\')','name' => 'items['.e($resourceItem->getItem()->getKey(), false).']','class' => 'tableActionRow','value' => ''.e($resourceItem->getItem()->getKey(), false).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </td>
        <?php endif; ?>

        <?php $__currentLoopData = $resourceItem->getFields()->indexFields(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td class="bgc-<?php echo e($resourceItem->tdClass($resourceItem->getItem(), $loop->parent->index, $index + 1), false); ?>"
                style="<?php echo e($resourceItem->tdStyles($resourceItem->getItem(), $loop->parent->index, $index + 1), false); ?>"
            >
                <?php echo $field->isSee($resourceItem->getItem()) ? $field->indexViewValue($resourceItem->getItem()): ''; ?>

            </td>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php if(!$resource->isPreviewMode()): ?>
            <td class="bgc-<?php echo e($resourceItem->tdClass($resourceItem->getItem(), $loop->index, count($resourceItem->getFields()->indexFields()) + 1), false); ?>"
                style="<?php echo e($resourceItem->tdStyles($resourceItem->getItem(), $loop->index, count($resourceItem->getFields()->indexFields()) + 1), false); ?>"
            >
                <?php echo $__env->make("moonshine::crud.shared.table-row-actions", ["resource" => $resourceItem], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </td>
        <?php endif; ?>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /var/www/vendor/moonshine/moonshine/resources/views/crud/shared/table-body.blade.php ENDPATH**/ ?>