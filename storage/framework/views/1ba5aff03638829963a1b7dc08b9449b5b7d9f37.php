<?php $__env->startSection('title', 'Запись на прием - ' . config('app.name')); ?>

<?php $__env->startSection('content'); ?>
    <div class="account-page">
        <div class="container-fluid">
            <div class="account-page__inner">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.breadcrumbs.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('breadcrumbs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.breadcrumbs.item','data' => ['isActive' => true,'isLarge' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('breadcrumbs.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['isActive' => true,'isLarge' => true]); ?>Запись на прием <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>


                <div class="account-page__forms section-top-space">
                    <div class="row">
                        <div class="col-12">

                            <?php echo $__env->make('user.partials.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            <section class="price-list">
                                <div class="price-list__wrapper">

                                    <div class="card mb-4">
                                        <div class="card-header">
                                            Информация о приеме
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <b>Статус:</b>
                                                <?php echo e(__('custom.' . $appointment['status']), false); ?>

                                            </li>
                                            <li class="list-group-item">
                                                <b>Тип приема:</b>
                                                <span><?php echo e($appointment['appointmentType']['title'], false); ?></span>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Услуга:</b>
                                                <span><?php echo e($entry['title'], false); ?></span>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Дата:</b>
                                                <span><?php echo e(__date($appointment['date']), false); ?></span>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Время:</b>
                                                <span><?php echo e($appointment['time'], false); ?></span>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Продолжительность приема:</b>
                                                <span><?php echo e($appointment['duration'], false); ?> мин.</span>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Стоимость:</b>
                                                <span><?php echo e(price($entry['price']), false); ?></span>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            Информация о враче
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <b>ФИО:</b>
                                                <span><?php echo e($doctor['surname'], false); ?> <?php echo e($doctor['name'], false); ?> <?php echo e($doctor['secondName'], false); ?></span>
                                            </li>
                                            <?php if($doctor['note']): ?>
                                                <li class="list-group-item">
                                                    <?php echo e($doctor['note'], false); ?>

                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>

                                </div>
                            </section>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/user/appointment/show.blade.php ENDPATH**/ ?>