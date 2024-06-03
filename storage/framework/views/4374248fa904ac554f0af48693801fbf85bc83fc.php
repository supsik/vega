<?php $__env->startSection('title', ' Хирургическое отделение - ' . config('app.name')); ?>


<?php $__env->startSection('content'); ?>
    <div class="diagnostics-page">
        <div class="container-fluid">
            <div class="diagnostics-page__inner">
                <div class="row">
                    <div class="col-12 col-md-12">
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.breadcrumbs.item','data' => ['link' => '/operations-blocks']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('breadcrumbs.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['link' => '/operations-blocks']); ?>Хирургическое отделение <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <h1 class="breadcrumb__heading">Хирургическое отделение</h1>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>
                </div>
                <div class="row section-top-space">
                    <div class="col-12 col-md-7">
                        <div class="diagnostics-page__text">
                            <?php echo $moonPageContent; ?>

                        </div>
                    </div>
                    <div class="col-12 col-md-5">
                        <?php if($directions->count()): ?>
                            <section class="specialists-section">
                                <h3 class="specialists-section__title section-title">
                                    Направления
                                </h3>
                                <div class="specialists-section__list">
                                    <?php $__currentLoopData = $directions->sortBy('order'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $direction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a class="person person--link doctors__person"
                                            href="<?php echo e(route('operations.index', $direction->slug), false); ?>">
                                            <img class="person__photo img-fluid"
                                                src="<?php echo e($direction->getFirstMediaUrl('cover'), false); ?>"
                                                alt="<?php echo e($direction->name, false); ?>">
                                            <div class="person__info">
                                                <h4 class="person__name" itemprop = "employee" >
                                                    <?php echo e($direction->name, false); ?>

                                                </h4>
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
    $html = \Livewire\Livewire::mount('operations-filter', [])->html();
} elseif ($_instance->childHasBeenRendered('kY9p7Pz')) {
    $componentId = $_instance->getRenderedChildComponentId('kY9p7Pz');
    $componentTag = $_instance->getRenderedChildComponentTagName('kY9p7Pz');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('kY9p7Pz');
} else {
    $response = \Livewire\Livewire::mount('operations-filter', []);
    $html = $response->html();
    $_instance->logRenderedChild('kY9p7Pz', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?> </livewire:operations-filter>
            </div>
        </div>
    </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/operations/general.blade.php ENDPATH**/ ?>