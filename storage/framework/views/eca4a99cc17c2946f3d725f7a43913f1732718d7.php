<?php $__env->startSection('title', $page->seo_title ?? 'Контакты - ' . config('app.name')); ?>
<?php $__env->startSection('description', $page->seo_description); ?>
<?php $__env->startSection('keywords', $page->seo_keywords); ?>

<?php $__env->startSection('content'); ?>
    <div class="contacts-page">
        <div class="container-fluid">
            <div class="contacts-page__inner">

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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.breadcrumbs.item','data' => ['isActive' => true,'isDark' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('breadcrumbs.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['isActive' => true,'isDark' => true]); ?>Контакты <?php echo $__env->renderComponent(); ?>
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

            </div>

            <section class="contacts-section section-top-space">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="contacts-section__info">
                            <?php echo $page->first_block_text; ?>

                        </div>
                    </div>

                    <div class="col-12 col-md-6">

                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('form.contact', [])->html();
} elseif ($_instance->childHasBeenRendered('YWyIVJX')) {
    $componentId = $_instance->getRenderedChildComponentId('YWyIVJX');
    $componentTag = $_instance->getRenderedChildComponentTagName('YWyIVJX');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('YWyIVJX');
} else {
    $response = \Livewire\Livewire::mount('form.contact', []);
    $html = $response->html();
    $_instance->logRenderedChild('YWyIVJX', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

                    </div>

                </div>
            </section>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/contacts.blade.php ENDPATH**/ ?>