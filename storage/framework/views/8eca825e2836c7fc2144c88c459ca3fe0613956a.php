<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale()), false); ?>" x-data="{}">
    <head>
        <?php echo $__env->make('moonshine::layouts.shared.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo moonshineAssets()->css(); ?>


        <?php echo $__env->yieldContent('after-styles'); ?>

        <?php echo $__env->yieldPushContent('styles'); ?>

        <?php echo moonshineAssets()->js(); ?>


        <?php echo $__env->yieldContent('after-scripts'); ?>

        <style>
            [x-cloak] { display: none !important; }
        </style>

        <script>
            const translates = <?php echo \Illuminate\Support\Js::from(__('moonshine::ui'))->toHtml() ?>;
        </script>
    </head>
    <body x-cloak x-data="{ minimizedMenu: $persist(false).as('minimizedMenu'), asideMenuOpen: false }">
        <div class="layout-wrapper" :class="minimizedMenu && 'layout-wrapper-short'">
            <?php $__env->startSection('sidebar'); ?>
                <?php echo $__env->make('moonshine::layouts.shared.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->yieldSection(); ?>

            <div class="layout-page">
                <?php echo $__env->make('moonshine::layouts.shared.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php $__env->startSection('header'); ?>
                    <?php echo $__env->make('moonshine::layouts.shared.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->yieldSection(); ?>

                <main class="layout-content">
                    <?php echo $__env->yieldContent('content'); ?>
                </main>

                <?php $__env->startSection('footer'); ?>
                    <?php echo $__env->make('moonshine::layouts.shared.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->yieldSection(); ?>
            </div>
        </div>

        <?php echo $__env->yieldPushContent('scripts'); ?>

        <?php echo $__env->make('moonshine::ui.img-popup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </body>
</html>
<?php /**PATH /var/www/vendor/moonshine/moonshine/resources/views/layouts/app.blade.php ENDPATH**/ ?>