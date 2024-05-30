<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'crudMode' => false,
    'values' => false,
    'columns' => false,
    'notfound' => false,
    'responsive' => true,
    'thead',
    'tbody',
    'tfoot',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'crudMode' => false,
    'values' => false,
    'columns' => false,
    'notfound' => false,
    'responsive' => true,
    'thead',
    'tbody',
    'tfoot',
]); ?>
<?php foreach (array_filter(([
    'crudMode' => false,
    'values' => false,
    'columns' => false,
    'notfound' => false,
    'responsive' => true,
    'thead',
    'tbody',
    'tfoot',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php if(isset($tbody) || (is_iterable($values) && count($values))): ?>
    <!-- Table -->
    <div <?php if($responsive): ?> class="table-responsive" <?php endif; ?>>
        <table <?php echo e($attributes->merge(['class' => 'table' . ($crudMode ? '-list' : '')]), false); ?>>
            <thead <?php echo e(isset($thead) ? $thead?->attributes : '', false); ?>>
            <tr>
                <?php if(is_array($columns)): ?>
                    <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <th>
                            <?php echo $label; ?>

                        </th>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

                <?php echo e($thead ?? '', false); ?>

            </tr>
            </thead>
            <tbody  <?php echo e(isset($tbody) ? $tbody?->attributes : '', false); ?>>
            <?php if(is_iterable($values)): ?>
                <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td>
                                <?php echo isset($data[$name]) && is_scalar($data[$name]) ? $data[$name] : ''; ?>

                            </td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

            <?php echo e($tbody ?? '', false); ?>

            </tbody>
            <?php if($tfoot ?? false): ?>
                <tfoot  <?php echo e($tfoot->attributes, false); ?>>
                <tr>
                    <?php echo e($tfoot, false); ?>

                </tr>
                </tfoot>
            <?php endif; ?>
        </table>
    </div>
<?php elseif($notfound): ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'moonshine::components.alert','data' => ['type' => 'default','class' => 'my-4','icon' => 'heroicons.no-symbol']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('moonshine::alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'default','class' => 'my-4','icon' => 'heroicons.no-symbol']); ?>
        <?php echo e(trans('moonshine::ui.notfound'), false); ?>

     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php endif; ?>
<?php /**PATH /var/www/vendor/moonshine/moonshine/resources/views/components/table/index.blade.php ENDPATH**/ ?>