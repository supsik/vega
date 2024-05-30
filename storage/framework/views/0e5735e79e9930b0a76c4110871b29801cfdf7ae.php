<div x-data="asyncData">
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'moonshine::components.form.switcher','data' => ['attributes' => $element->attributes()->except('x-on:change'),'id' => $element->id(),'name' => $element->name(),'onValue' => $element->getOnValue(),'offValue' => $element->getOffValue(),'@change' => (($autoUpdate ?? false) && $element->resource()
            ? 'updateColumn(
                `'.$element->resource()?->route('update-column', $item->getKey()).'`,
                `'.$element->field().'`,
                $event.target.checked ? `'.$element->getOnValue().'` : `'.$element->getOffValue().'`
            )'
            : $element->attributes()->get('x-on:change')
        ),'value' => ($element->getOnValue() == $element->formViewValue($item) ? $element->getOnValue() : $element->getOffValue()),'checked' => $element->getOnValue() == $element->formViewValue($item)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('moonshine::form.switcher'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($element->attributes()->except('x-on:change')),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($element->id()),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($element->name()),'onValue' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($element->getOnValue()),'offValue' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($element->getOffValue()),'@change' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute((($autoUpdate ?? false) && $element->resource()
            ? 'updateColumn(
                `'.$element->resource()?->route('update-column', $item->getKey()).'`,
                `'.$element->field().'`,
                $event.target.checked ? `'.$element->getOnValue().'` : `'.$element->getOffValue().'`
            )'
            : $element->attributes()->get('x-on:change')
        )),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(($element->getOnValue() == $element->formViewValue($item) ? $element->getOnValue() : $element->getOffValue())),'checked' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($element->getOnValue() == $element->formViewValue($item))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
</div>
<?php /**PATH /var/www/vendor/moonshine/moonshine/resources/views/fields/switch.blade.php ENDPATH**/ ?>