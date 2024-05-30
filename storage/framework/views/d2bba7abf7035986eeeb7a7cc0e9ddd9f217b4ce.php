<?php $__env->startSection('title', $employee->seo_title ?? $employee->name . '- Управление клиникой - ' . config('app.name')); ?>
<?php $__env->startSection('description', $employee->seo_description); ?>
<?php $__env->startSection('keywords', $employee->seo_keywords); ?>

<?php $__env->startSection('content'); ?>
    <div class="employee-page">
        <div class="container-fluid">
            <div class="employee-page__inner">


                <div class="row">
                    <div class="col-12 col-md-7">

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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.breadcrumbs.item','data' => ['link' => ''.e(route('team.index'), false).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('breadcrumbs.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['link' => ''.e(route('team.index'), false).'']); ?>Управление клиникой
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.breadcrumbs.item','data' => ['isActive' => true,'isLarge' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('breadcrumbs.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['isActive' => true,'isLarge' => true]); ?><?php echo e($employee->name, false); ?> <?php echo $__env->renderComponent(); ?>
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

                        <?php if($employee->position): ?>
                            <div class="employee-page__position">
                                <?php echo e($employee->position->name, false); ?>

                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="col-12 col-md-5">
                        <div class="employee-page__photo">
                            <img src="<?php echo e($employee->getFirstMediaUrl('photo'), false); ?>" alt ="<?php echo e($doctor->full_name, false); ?> <?php echo e($doctor->specialitiesList, false); ?>">>
                        </div>
                    </div>
                </div>

                <div class="row pt-4">
                    <div class="col-md-10">
                        <div class="employee-page__text mt-0">
                            <?php echo $employee->description; ?>

                        </div>
                    </div>

                    <div class="col-md-10">

                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('form.review', ['name' => $employee->name])->html();
} elseif ($_instance->childHasBeenRendered('cQ94flL')) {
    $componentId = $_instance->getRenderedChildComponentId('cQ94flL');
    $componentTag = $_instance->getRenderedChildComponentTagName('cQ94flL');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('cQ94flL');
} else {
    $response = \Livewire\Livewire::mount('form.review', ['name' => $employee->name]);
    $html = $response->html();
    $_instance->logRenderedChild('cQ94flL', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

                    </div>

                </div>


            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/team/show.blade.php ENDPATH**/ ?>