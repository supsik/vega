<div class="sm:flex
    <?php if(!$element->isWithoutSpace()): ?> gap-4 <?php endif; ?>
    items-<?php echo e($element->getItemsAlign(), false); ?>

    justify-<?php echo e($element->getJustifyAlign(), false); ?>"
>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'moonshine::components.resource-renderable','data' => ['components' => $element->getFields(),'item' => $item,'resource' => $resource,'container' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('moonshine::resource-renderable'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['components' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($element->getFields()),'item' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item),'resource' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($resource),'container' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
</div>
<?php /**PATH /var/www/vendor/moonshine/moonshine/resources/views/decorations/flex.blade.php ENDPATH**/ ?>