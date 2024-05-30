<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'moonshine::components.form.select','data' => ['attributes' => $element->attributes()->merge([
        'id' => $element->id(),
        'placeholder' => $element->label() ?? '',
        'name' => $element->name(),
    ]),'nullable' => $element->isNullable(),'searchable' => $element->isSearchable(),'class' => \Illuminate\Support\Arr::toCssClasses(['form-invalid' => $errors->has($element->name())]),'asyncRoute' => (method_exists($element, 'isAsyncSearch') && $element->isAsyncSearch()) ?
            route('moonshine.search.relations', [
                    'resource' => $element->parent() && $element->parent()->resource()
                        ? $element->parent()->resource()->uriKey()
                        : $resource->uriKey(),
                    'column' => $element->field(),
                ]) : null]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('moonshine::form.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($element->attributes()->merge([
        'id' => $element->id(),
        'placeholder' => $element->label() ?? '',
        'name' => $element->name(),
    ])),'nullable' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($element->isNullable()),'searchable' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($element->isSearchable()),'class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(\Illuminate\Support\Arr::toCssClasses(['form-invalid' => $errors->has($element->name())])),'asyncRoute' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute((method_exists($element, 'isAsyncSearch') && $element->isAsyncSearch()) ?
            route('moonshine.search.relations', [
                    'resource' => $element->parent() && $element->parent()->resource()
                        ? $element->parent()->resource()->uriKey()
                        : $resource->uriKey(),
                    'column' => $element->field(),
                ]) : null)]); ?>
     <?php $__env->slot('options', null, []); ?> 
        <?php if($element->isNullable()): ?>
            <option <?php if(!$element->formViewValue($item)): echo 'selected'; endif; ?> value="">-</option>
        <?php endif; ?>
        <?php $__currentLoopData = $element->values(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionValue => $optionName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(is_array($optionName)): ?>
                <optgroup label="<?php echo e($optionValue, false); ?>">
                    <?php $__currentLoopData = $optionName; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oValue => $oName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php if($element->isSelected($item, $oValue)): echo 'selected'; endif; ?>
                                value="<?php echo e($oValue, false); ?>"
                        >
                            <?php echo e($oName, false); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </optgroup>
            <?php else: ?>
                <option <?php if($element->isSelected($item, $optionValue)): echo 'selected'; endif; ?>
                        value="<?php echo e($optionValue, false); ?>"
                >
                    <?php echo e($optionName, false); ?>

                </option>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     <?php $__env->endSlot(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php /**PATH /var/www/vendor/moonshine/moonshine/resources/views/fields/select.blade.php ENDPATH**/ ?>