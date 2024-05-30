<?php if($element->tabs()->isNotEmpty()): ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'moonshine::components.tabs','data' => ['class' => 'mb-4','id' => 'tabs_'.e($element->id(), false).'','tabs' => $element->tabsWithHtml()->toArray(),'contents' => $element->contentWithHtml($resource, $item)->toArray()]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('moonshine::tabs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-4','id' => 'tabs_'.e($element->id(), false).'','tabs' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($element->tabsWithHtml()->toArray()),'contents' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($element->contentWithHtml($resource, $item)->toArray())]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php endif; ?>
<?php /**PATH /var/www/vendor/moonshine/moonshine/resources/views/decorations/tabs.blade.php ENDPATH**/ ?>