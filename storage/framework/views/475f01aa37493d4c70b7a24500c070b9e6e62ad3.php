<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'file' => null,
    'path' => '',
    'dir' => '',
    'download' => false,
    'removable' => true,
    'imageable' => true
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'file' => null,
    'path' => '',
    'dir' => '',
    'download' => false,
    'removable' => true,
    'imageable' => true
]); ?>
<?php foreach (array_filter(([
    'file' => null,
    'path' => '',
    'dir' => '',
    'download' => false,
    'removable' => true,
    'imageable' => true
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php
    $fileWithDir = str($file)->remove($dir)
                        ->prepend($dir)
                        ->prepend($path)
                        ->value();

    $xValueExpr = "xValue";

    if($path || $dir) {
        $xValueExpr = "xValue && xValue.length ? ('$path') + '$dir' + (!xValue.replace('$dir', '').startsWith('/') ? '/' : '') + xValue.replace('$dir', '') : ''";
    }
?>

<div
    id="hidden_parent_<?php echo e($attributes->get('id'), false); ?>"
    class="x-removeable dropzone-item zoom-in <?php if(!$imageable): ?> dropzone-item-file <?php endif; ?>"
>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'moonshine::components.form.input','data' => ['type' => 'hidden','name' => 'hidden_' . $attributes->get('name'),'attributes' => $attributes->merge(array_merge([
            'x-ref' => 'hidden_' . $attributes->get('id'),
        ], $attributes->has('x-model-field') ? [
           ':name' => '`hidden_`+' . $attributes->get('x-bind:name'),
           ':value' => 'xValue',
        ] : ['value' => $file]))->except(['type', 'id', 'name', 'x-bind:name', 'x-model', 'x-model.lazy', 'x-bind:id', 'accept', 'multiple'])]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('moonshine::form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'hidden','name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('hidden_' . $attributes->get('name')),'attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes->merge(array_merge([
            'x-ref' => 'hidden_' . $attributes->get('id'),
        ], $attributes->has('x-model-field') ? [
           ':name' => '`hidden_`+' . $attributes->get('x-bind:name'),
           ':value' => 'xValue',
        ] : ['value' => $file]))->except(['type', 'id', 'name', 'x-bind:name', 'x-model', 'x-model.lazy', 'x-bind:id', 'accept', 'multiple']))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

    <?php if(!$imageable): ?>
        <?php echo $__env->make('moonshine::ui.file', [
            'value' => $fileWithDir,
            'xValue' => $attributes->has('x-model-field')
                ? $xValueExpr
                : null,
            'download' => $download
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <?php if($removable): ?>
        <button
            class="dropzone-remove"
            type="button"
            @click.prevent="$event.target.closest('#hidden_parent_<?php echo e($attributes->get('id'), false); ?>').remove()"
        >
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'moonshine::components.icon','data' => ['icon' => 'heroicons.x-mark']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('moonshine::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'heroicons.x-mark']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        </button>
    <?php endif; ?>

    <?php if($imageable): ?>
        <img
            <?php if($attributes->has('x-model-field')): ?>
                :src="<?php echo e($xValueExpr, false); ?>"
            <?php else: ?>
                src="<?php echo e($fileWithDir, false); ?>"
            <?php endif; ?>
        >
    <?php endif; ?>
</div>
<?php /**PATH /var/www/vendor/moonshine/moonshine/resources/views/components/form/file-item.blade.php ENDPATH**/ ?>