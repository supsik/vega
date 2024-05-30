<?php $__env->startSection('title', 'Анализы - ' . config('app.name')); ?>

<div class="tests-page">
    <div class="container-fluid">
        <div class="tests-page__inner">

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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.breadcrumbs.item','data' => ['isActive' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('breadcrumbs.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['isActive' => true]); ?>Анализы <?php echo $__env->renderComponent(); ?>
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


            <div class="filter tests-page__filter">
                <div class="filter__wrapper">
                    <input
                        wire:model.debounce.500ms="search"
                        class="filter__input"
                        type="text"
                        placeholder="Поиск по анализам"
                    >
                </div>
            </div>

            <div class="tests-page__calc">
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <div class="calc-result">
                            <h5 class="calc-result__sum">
                                Вы выбрали анализы на сумму: <span><?php echo e(price($this->totalPrice), false); ?></span>
                            </h5>
                            <div class="calc-result__list">

                                <?php $__currentLoopData = $this->selectedAnalysis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $analysis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('analysis.selected-item', ['analysis' => $analysis])->html();
} elseif ($_instance->childHasBeenRendered('calc_' . $analysis->id)) {
    $componentId = $_instance->getRenderedChildComponentId('calc_' . $analysis->id);
    $componentTag = $_instance->getRenderedChildComponentTagName('calc_' . $analysis->id);
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('calc_' . $analysis->id);
} else {
    $response = \Livewire\Livewire::mount('analysis.selected-item', ['analysis' => $analysis]);
    $html = $response->html();
    $_instance->logRenderedChild('calc_' . $analysis->id, $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-8">

                        <?php if($this->analysisGroups->count() > 0): ?>
                            <?php $__currentLoopData = $this->analysisGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <section class="price-list">
                                    <h4 class="price-list__title"><?php echo e($group->name, false); ?></h4>

                                    <div class="price-list__wrapper">

                                        <?php $__currentLoopData = $group->analysis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $analysis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('analysis.list-item', ['analysis' => $analysis])->html();
} elseif ($_instance->childHasBeenRendered('list_' . $analysis->id)) {
    $componentId = $_instance->getRenderedChildComponentId('list_' . $analysis->id);
    $componentTag = $_instance->getRenderedChildComponentTagName('list_' . $analysis->id);
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('list_' . $analysis->id);
} else {
    $response = \Livewire\Livewire::mount('analysis.list-item', ['analysis' => $analysis]);
    $html = $response->html();
    $_instance->logRenderedChild('list_' . $analysis->id, $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </section>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php if($this->loadMoreVisible): ?>
                                <button wire:click="loadMore" class="btn btn-main btn-lg">Показать еще</button>
                            <?php endif; ?>
                        <?php else: ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Ничего не найдено <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <?php endif; ?>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php /**PATH /var/www/resources/views/livewire/pages/analysis-page.blade.php ENDPATH**/ ?>