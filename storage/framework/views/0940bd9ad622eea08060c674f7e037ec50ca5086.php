<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'moonshine::components.form.range','data' => ['uniqueId' => $element->id(),'attributes' => $element->attributes(),'fromValue' => $element->formViewValue($item)[$element->fromField] ?? $element->min,'toValue' => $element->formViewValue($item)[$element->toField] ?? $element->max,'fromName' => ''.e($element->name(), false).'['.e($element->fromField, false).']','toName' => ''.e($element->name(), false).'['.e($element->toField, false).']','fromField' => ''.e($element->field(), false).'.'.e($element->fromField, false).'','toField' => ''.e($element->field(), false).'.'.e($element->toField, false).'','class' => \Illuminate\Support\Arr::toCssClasses(['form-invalid' => $errors->has($element->name())])]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('moonshine::form.range'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['uniqueId' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($element->id()),'attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($element->attributes()),'fromValue' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($element->formViewValue($item)[$element->fromField] ?? $element->min),'toValue' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($element->formViewValue($item)[$element->toField] ?? $element->max),'fromName' => ''.e($element->name(), false).'['.e($element->fromField, false).']','toName' => ''.e($element->name(), false).'['.e($element->toField, false).']','fromField' => ''.e($element->field(), false).'.'.e($element->fromField, false).'','toField' => ''.e($element->field(), false).'.'.e($element->toField, false).'','class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(\Illuminate\Support\Arr::toCssClasses(['form-invalid' => $errors->has($element->name())]))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php /**PATH /var/www/vendor/moonshine/moonshine/resources/views/fields/slide.blade.php ENDPATH**/ ?>