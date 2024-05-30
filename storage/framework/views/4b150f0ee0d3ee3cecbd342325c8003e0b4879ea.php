<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'files' => [],
    'path' => '',
    'dir' => '',
    'download' => false,
    'removable' => true,
    'imageable' => true
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'files' => [],
    'path' => '',
    'dir' => '',
    'download' => false,
    'removable' => true,
    'imageable' => true
]); ?>
<?php foreach (array_filter(([
    'files' => [],
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
<div class="form-group form-group-dropzone">
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'moonshine::components.form.input','data' => ['type' => 'file','attributes' => $attributes->merge(['class' => 'form-file-upload'])->except(['x-model', 'x-model.lazy', 'x-bind:id', 'id'])]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('moonshine::form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'file','attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes->merge(['class' => 'form-file-upload'])->except(['x-model', 'x-model.lazy', 'x-bind:id', 'id']))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

    <?php if($attributes->has('x-model-field') || array_filter((array) $files)): ?>
        <div class="dropzone"
             <?php if($attributes->has('x-model-field')): ?>
                <?php if($attributes->get('multiple')): ?>
                    x-show="Object.keys(<?php echo e($attributes->get('x-model-field'), false); ?>).length"
                <?php else: ?>
                    x-show="<?php echo e($attributes->get('x-model-field'), false); ?>"
                <?php endif; ?>
            <?php endif; ?>
        >
            <div class="dropzone-items"
                 <?php if($attributes->has('x-model-field')): ?>
                     x-data="{xValues: <?php echo e($attributes->get('multiple') ? $attributes->get('x-model-field', '[]') : $attributes->get('x-model-field', '') . '.split(" ")', false); ?>}"
                <?php endif; ?>
            >
                <?php if($attributes->has('x-model-field')): ?>
                    <template x-for="(xValue, index) in xValues" :key="index">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'moonshine::components.form.file-item','data' => ['attributes' => $attributes,'path' => $path,'dir' => $dir,'download' => $download,'removable' => $removable,'imageable' => $imageable]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('moonshine::form.file-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes),'path' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($path),'dir' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($dir),'download' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($download),'removable' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($removable),'imageable' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($imageable)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </template>
                <?php else: ?>
                    <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'moonshine::components.form.file-item','data' => ['attributes' => $attributes,'dir' => $dir,'path' => $path,'file' => $file,'download' => $download,'removable' => $removable,'imageable' => $imageable]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('moonshine::form.file-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes),'dir' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($dir),'path' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($path),'file' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($file),'download' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($download),'removable' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($removable),'imageable' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($imageable)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH /var/www/vendor/moonshine/moonshine/resources/views/components/form/file.blade.php ENDPATH**/ ?>