<?php $__env->startSection('title', $diagnostics->seo_title ?? $diagnostics->name .  ' - Диагностики - ' .  config('app.name')); ?>
<?php $__env->startSection('description', $diagnostics->seo_description); ?>
<?php $__env->startSection('keywords', $diagnostics->seo_keywords); ?>

<?php $__env->startSection('content'); ?>
    <div class="diagnostics-page">
        <div class="container-fluid">
            <div class="diagnostics-page__inner">

                <div class="row">
                    <div class="col-12 col-md-5">
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.breadcrumbs.item','data' => ['link' => 'javascript:void(0)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('breadcrumbs.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['link' => 'javascript:void(0)']); ?>Диагностика <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <h1 class="breadcrumb__heading"><?php echo e($diagnostics->name, false); ?></h1>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>

                    <div class="col-12 col-md-7">
                        <div class="diagnostics-page__photo">
                            <img class="img-fluid" src="<?php echo e($diagnostics->getFirstMediaUrl('cover'), false); ?>">
                        </div>
                    </div>
                </div>

                <div class="row section-top-space">
                    <div class="col-12 col-md-7">
                        <?php if($diagnostics->description): ?>
                            <div class="diagnostics-page__text">
                                <?php echo $diagnostics->description; ?>

                            </div>
                        <?php endif; ?>
                    </div>


                    <div class="col-12 col-md-5">
                        <?php if($diagnostics->doctors->count()): ?>

                            <section class="specialists-section">

                                <h3 class="specialists-section__title section-title">
                                    Специалисты
                                </h3>

                                <div class="specialists-section__list">
                                    <?php $__currentLoopData = $diagnostics->doctors->sortBy('fullName'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a class="person person--link doctors__person"
                                           href="<?php echo e(route('doctors.show', $doctor), false); ?>">
                                            <img
                                                class="person__photo img-fluid"
                                                src="<?php echo e($doctor->getFirstMediaUrl('photo'), false); ?>"
                                                alt="<?php echo e($doctor->full_name, false); ?>"
                                            >
                                            <div class="person__info">
                                                <h4 class="person__name" itemprop = "employee">
                                                    <?php echo e($doctor->full_name, false); ?>

                                                </h4>
                                                <span class="person__position" itemprop = "medicalSpecialty">
                                                <?php echo e($doctor->specialitiesList, false); ?>

                                            </span>
                                            </div>
                                        </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </section>
                        <?php endif; ?>

                    </div>

                </div>

                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('services-filter', ['diagnosticsId' => $diagnostics->id])->html();
} elseif ($_instance->childHasBeenRendered('XyT3aGF')) {
    $componentId = $_instance->getRenderedChildComponentId('XyT3aGF');
    $componentTag = $_instance->getRenderedChildComponentTagName('XyT3aGF');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('XyT3aGF');
} else {
    $response = \Livewire\Livewire::mount('services-filter', ['diagnosticsId' => $diagnostics->id]);
    $html = $response->html();
    $_instance->logRenderedChild('XyT3aGF', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?></livewire:services-filter>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/diagnostics/show.blade.php ENDPATH**/ ?>