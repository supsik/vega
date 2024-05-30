<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'moonshine::components.form.file','data' => ['attributes' => $element->attributes()->merge([
        'id' => $element->id(),
        'name' => $element->name(),
    ]),'files' => is_iterable($element->formViewValue($item)) ? $element->formViewValue($item) : [$element->formViewValue($item)],'removable' => $element->isRemovable(),'imageable' => true,'dir' => $element->getDir(),'path' => $element->path('')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('moonshine::form.file'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($element->attributes()->merge([
        'id' => $element->id(),
        'name' => $element->name(),
    ])),'files' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(is_iterable($element->formViewValue($item)) ? $element->formViewValue($item) : [$element->formViewValue($item)]),'removable' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($element->isRemovable()),'imageable' => true,'dir' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($element->getDir()),'path' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($element->path(''))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php /**PATH /var/www/vendor/moonshine/moonshine/resources/views/fields/image.blade.php ENDPATH**/ ?>