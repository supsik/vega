<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'moonshine::components.form.index','data' => ['errors' => $errors,'id' => 'moonshine-form','xData' => 'crudForm()','xInit' => 'init('.json_encode(['whenFields' => array_values($resource->getFields()->whenFieldsConditions()->toArray())]).')','action' => ''.e($resource->route(($item->exists ? 'update' : 'store'), $item->getKey()), false).'','enctype' => 'multipart/form-data','method' => 'POST','xOn:submit.prevent' => ''.e($resource->isPrecognition() ? 'precognition($event.target)' : '$event.target.submit()', false).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('moonshine::form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['errors' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors),'id' => 'moonshine-form','x-data' => 'crudForm()','x-init' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('init('.json_encode(['whenFields' => array_values($resource->getFields()->whenFieldsConditions()->toArray())]).')'),'action' => ''.e($resource->route(($item->exists ? 'update' : 'store'), $item->getKey()), false).'','enctype' => 'multipart/form-data','method' => 'POST','x-on:submit.prevent' => ''.e($resource->isPrecognition() ? 'precognition($event.target)' : '$event.target.submit()', false).'']); ?>
    <?php echo $__env->make('moonshine::crud.shared.form-hidden', ['resource' => $resource], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if($item->exists): ?>
        <?php echo method_field('PUT'); ?>
    <?php endif; ?>

    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'moonshine::components.resource-renderable','data' => ['components' => $resource->getFields(),'item' => $item,'resource' => $resource]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('moonshine::resource-renderable'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['components' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($resource->getFields()),'item' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item),'resource' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($resource)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

    <?php echo $__env->make('moonshine::crud.shared.form-actions', [
        'item' => $item,
        'resource' => $resource
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

<?php if($item->exists && !$resource->isRelatable()): ?>
    <?php $__currentLoopData = $resource->getFields()->relatable(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($field->canDisplayOnForm($item)): ?>
            <?php echo e($resource->renderComponent($field, $item), false); ?>

        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php if($resource->componentsCollection()->formComponents()->isNotEmpty()): ?>
    <?php $__currentLoopData = $resource->componentsCollection()->formComponents(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formComponent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($formComponent->isSee($item)): ?>
            <?php echo e($resource->renderComponent($formComponent, $item), false); ?>

        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH /var/www/vendor/moonshine/moonshine/resources/views/crud/shared/form.blade.php ENDPATH**/ ?>