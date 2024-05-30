<?php $__env->startSection('title', $doctor->seo_title ?? $doctor->full_name . ' - МегаДоктора - ' . config('app.name')); ?>
<?php $__env->startSection('description', $doctor->seo_description ?? ''); ?>
<?php $__env->startSection('keywords', $doctor->seo_keywords); ?>

<?php $__env->startSection('content'); ?>
    <div class="employee-page">
        <div class="container-fluid">
            <div class="employee-page__inner">

                <div class="row" >
                    <div class="col-12 col-md-7">
                        <nav class="breadcrumb">
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.breadcrumbs.item','data' => ['link' => ''.e(route('doctors.index'), false).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('breadcrumbs.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['link' => ''.e(route('doctors.index'), false).'']); ?>МегаДоктора <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                <h1 class="breadcrumb__heading" itemprop = "employee"><?php echo e($doctor->full_name, false); ?></h1>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </nav>

                        <div class="employee-page__position" itemprop = "medicalSpecialty">
                            <?php echo e($doctor->specialitiesList, false); ?>

                        </div>

                        <?php if($doctor->price): ?>
                            <div class="employee-page__price"itemprop="name" content="Консультация" >
                                Стоимость консультации <strong itemprop="priceRange"><?php echo e(price($doctor->price), false); ?></strong>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="col-12 col-md-5">
                        <div class="employee-page__photo">
                            <img src="<?php echo e($doctor->getFirstMediaUrl('photo'), false); ?>" alt ="<?php echo e($doctor->full_name, false); ?> <?php echo e($doctor->specialitiesList, false); ?>">
                        </div>
                    </div>
                </div>

                <div class="row pt-4">
                    <div class="col-12 col-lg-7 order-2 order-lg-1">
                        <div class="employee-page__text">
                            <?php echo $doctor->description; ?>

                        </div>

                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('form.review', ['name' => $doctor->full_name])->html();
} elseif ($_instance->childHasBeenRendered('M56wKnl')) {
    $componentId = $_instance->getRenderedChildComponentId('M56wKnl');
    $componentTag = $_instance->getRenderedChildComponentTagName('M56wKnl');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('M56wKnl');
} else {
    $response = \Livewire\Livewire::mount('form.review', ['name' => $doctor->full_name]);
    $html = $response->html();
    $_instance->logRenderedChild('M56wKnl', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    </div>

                    <div class="col-12 col-lg-5 order-1 order-lg-2">

                        <?php if(count($firstSchedule)): ?>
                            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('schedule', ['title' => 'Запись в Клинику МЕГА на Доватора 22','clinicId' => 1,'schedule' => $firstSchedule,'doctor' => $doctor])->html();
} elseif ($_instance->childHasBeenRendered('PxWOrJZ')) {
    $componentId = $_instance->getRenderedChildComponentId('PxWOrJZ');
    $componentTag = $_instance->getRenderedChildComponentTagName('PxWOrJZ');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('PxWOrJZ');
} else {
    $response = \Livewire\Livewire::mount('schedule', ['title' => 'Запись в Клинику МЕГА на Доватора 22','clinicId' => 1,'schedule' => $firstSchedule,'doctor' => $doctor]);
    $html = $response->html();
    $_instance->logRenderedChild('PxWOrJZ', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?></livewire:schedule>
                        <?php endif; ?>

                        <?php if(count($secondSchedule)): ?>
                            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('schedule', ['title' => 'Запись в Клинику МЕГА на Весенней 7А','clinicId' => 4,'schedule' => $secondSchedule,'doctor' => $doctor])->html();
} elseif ($_instance->childHasBeenRendered('qAIhkjo')) {
    $componentId = $_instance->getRenderedChildComponentId('qAIhkjo');
    $componentTag = $_instance->getRenderedChildComponentTagName('qAIhkjo');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('qAIhkjo');
} else {
    $response = \Livewire\Livewire::mount('schedule', ['title' => 'Запись в Клинику МЕГА на Весенней 7А','clinicId' => 4,'schedule' => $secondSchedule,'doctor' => $doctor]);
    $html = $response->html();
    $_instance->logRenderedChild('qAIhkjo', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?></livewire:schedule>
                        <?php endif; ?>

                        <?php if(!count($firstSchedule) && !count($secondSchedule)): ?>
                        <span class="accordion-button__schedule-full">
                        К сожалению, на ближайшую неделю запись к доктору полная.
										Пожалуйста, позвоните в колл-центр 8(8672)40-41-30,
										наши операторы подберут для Вас другое удобное время или включат в лист ожидания.
                        </span>
                        <?php endif; ?>

                    </div>

                </div>
            </div>


        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/doctors/show.blade.php ENDPATH**/ ?>