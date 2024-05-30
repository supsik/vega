<!-- Navigation -->
<div class="layout-navigation">
    <?php $__env->startSection("header-inner"); ?>

    <?php echo $__env->yieldSection(); ?>

    <?php echo $__env->renderWhen(config('moonshine.header'), config('moonshine.header'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

    <?php echo $__env->renderWhen(
        config('moonshine.auth.enable', true),
        'moonshine::layouts.shared.notifications'
    , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

    <?php echo $__env->renderWhen(
        count(config('moonshine.locales', [])) > 1,
        'moonshine::layouts.shared.locales'
    , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
</div>
<!-- END: Navigation -->
<?php /**PATH /var/www/vendor/moonshine/moonshine/resources/views/layouts/shared/header.blade.php ENDPATH**/ ?>