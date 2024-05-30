<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'uniqueId' => 'slider',
    'fromName',
    'toName',
    'fromValue',
    'toValue',
    'fromField' => $fromName,
    'toField' => $toName
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'uniqueId' => 'slider',
    'fromName',
    'toName',
    'fromValue',
    'toValue',
    'fromField' => $fromName,
    'toField' => $toName
]); ?>
<?php foreach (array_filter(([
    'uniqueId' => 'slider',
    'fromName',
    'toName',
    'fromValue',
    'toValue',
    'fromField' => $fromName,
    'toField' => $toName
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<div <?php echo e($attributes->class(['form-group-range'])->only('class'), false); ?>>
    <div x-data="range(<?php echo e($attributes->get('x-model-field') ? 'item.'.$fromField.',item.'.$toField : '`'.$fromValue.'`,`'.$toValue.'`', false); ?>)"
         x-init="mintrigger(); maxtrigger()"
         data-min="<?php echo e($attributes->get('min', 0), false); ?>"
         data-max="<?php echo e($attributes->get('max', 1000), false); ?>"
         data-step="<?php echo e($attributes->get('step', 1), false); ?>"
         class="form-group-range-wrapper"
    >
        <div>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'moonshine::components.form.input','data' => ['type' => 'range','step' => ''.e($attributes->get('step', 1), false).'','xBind:min' => 'min','xBind:max' => 'max','xOn:input' => 'mintrigger','xModel' => 'minValue','class' => 'form-range-input','xBind:name' => '`'.e($fromName, false).'`','xOn:change' => 'onChangeField($event)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('moonshine::form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'range','step' => ''.e($attributes->get('step', 1), false).'','x-bind:min' => 'min','x-bind:max' => 'max','x-on:input' => 'mintrigger','x-model' => 'minValue','class' => 'form-range-input','x-bind:name' => '`'.e($fromName, false).'`','x-on:change' => 'onChangeField($event)']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'moonshine::components.form.input','data' => ['type' => 'range','step' => ''.e($attributes->get('step', 1), false).'','xBind:min' => 'min','xBind:max' => 'max','xOn:input' => 'maxtrigger','xModel' => 'maxValue','class' => 'form-range-input','xBind:name' => '`'.e($toName, false).'`','xOn:change' => 'onChangeField($event)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('moonshine::form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'range','step' => ''.e($attributes->get('step', 1), false).'','x-bind:min' => 'min','x-bind:max' => 'max','x-on:input' => 'maxtrigger','x-model' => 'maxValue','class' => 'form-range-input','x-bind:name' => '`'.e($toName, false).'`','x-on:change' => 'onChangeField($event)']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

            <div class="form-range-slider">
                <div class="form-range-tracker"></div>
                <div class="form-range-connect" x-bind:style="'right:'+maxthumb+'%; left:'+minthumb+'%'"></div>
                <div class="form-range-thumb" x-bind:style="'left: '+minthumb+'%'"></div>
                <div class="form-range-thumb" x-bind:style="'right: '+maxthumb+'%'"></div>
            </div>
        </div>

        <div class="form-group-range-fields">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'moonshine::components.form.input','data' => ['name' => ''.e($fromName, false).'','xBind:name' => '`'.e($fromName, false).'`','step' => ''.e($attributes->get('step', 1), false).'','xBind:min' => 'min','xBind:max' => 'max','type' => 'number','maxlength' => '5','xOn:input' => 'mintrigger','xModel' => 'minValue','xOn:change' => 'onChangeField($event)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('moonshine::form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => ''.e($fromName, false).'','x-bind:name' => '`'.e($fromName, false).'`','step' => ''.e($attributes->get('step', 1), false).'','x-bind:min' => 'min','x-bind:max' => 'max','type' => 'number','maxlength' => '5','x-on:input' => 'mintrigger','x-model' => 'minValue','x-on:change' => 'onChangeField($event)']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'moonshine::components.form.input','data' => ['name' => ''.e($toName, false).'','xBind:name' => '`'.e($toName, false).'`','step' => ''.e($attributes->get('step', 1), false).'','xBind:min' => 'min','xBind:max' => 'max','type' => 'number','maxlength' => '5','xOn:input' => 'maxtrigger','xModel' => 'maxValue','xOn:change' => 'onChangeField($event)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('moonshine::form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => ''.e($toName, false).'','x-bind:name' => '`'.e($toName, false).'`','step' => ''.e($attributes->get('step', 1), false).'','x-bind:min' => 'min','x-bind:max' => 'max','type' => 'number','maxlength' => '5','x-on:input' => 'maxtrigger','x-model' => 'maxValue','x-on:change' => 'onChangeField($event)']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH /var/www/vendor/moonshine/moonshine/resources/views/components/form/range.blade.php ENDPATH**/ ?>