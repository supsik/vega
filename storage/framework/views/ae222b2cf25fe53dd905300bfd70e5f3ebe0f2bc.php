<?php $__env->startSection('sidebar-inner'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('sidebar-inner'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header-inner'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('header-inner'); ?>

    <?php echo $__env->make('moonshine::layouts.shared.breadcrumbs', [
        'items' => [
            $resource->route('index') => $resource->title(),
            '#' => $item->{$resource->titleField()} ?? $item->getKey() ?? trans('moonshine::ui.create')
        ]
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startFragment('crud-form'); ?>
        <?php echo $__env->make($resource->formView(), ['item' => $item], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->stopFragment(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("moonshine::layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vendor/moonshine/moonshine/resources/views/crud/form.blade.php ENDPATH**/ ?>