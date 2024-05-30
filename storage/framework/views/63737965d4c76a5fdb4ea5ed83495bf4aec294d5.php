<?php $__env->startSection('title', 'Ошибка при загрузке данных'); ?>

<?php $__env->startSection('content'); ?>
    <div class="text-page">
        <div class="container-fluid">
            <div class="text-page__inner">

                <div class="text-page__content section-top-space text-center">
                    <h2 class="section-title h1">Произошла ошибка при загрузке данных.</h2>
                    <a class="btn btn-main btn-lg" href="<?php echo e(url(Request::getRequestUri()), false); ?>">Обновить страницу</a>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/errors/medods.blade.php ENDPATH**/ ?>