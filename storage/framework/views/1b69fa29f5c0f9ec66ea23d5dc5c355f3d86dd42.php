<div
    x-data="code('<?php echo e($element->id(), false); ?>', {
        lineNumbers: <?php echo e($element->lineNumbers ? 'true' : 'false', false); ?>,
        language: '<?php echo e($element->language ?? 'js', false); ?>',
        readonly: <?php echo e($element->isReadonly() ? 'true' : 'false', false); ?>,
    })"
    class="w-100 min-h-[300px] relative">
</div>

<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'moonshine::components.form.input','data' => ['type' => 'hidden','id' => ''.e($element->id(), false).'','name' => ''.e($element->name(), false).'','attributes' => $element->attributes()->only(['x-bind:name']),'value' => ''.e($element->formViewValue($item) ?? '', false).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('moonshine::form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'hidden','id' => ''.e($element->id(), false).'','name' => ''.e($element->name(), false).'','attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($element->attributes()->only(['x-bind:name'])),'value' => ''.e($element->formViewValue($item) ?? '', false).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php /**PATH /var/www/vendor/moonshine/moonshine/resources/views/fields/code.blade.php ENDPATH**/ ?>