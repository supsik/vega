<?php $__env->startSection('title', 'МегаДоктора - ' . config('app.name')); ?>

<div class="doctors-page">
    <div class="container-fluid">
        <div class="doctors-page__inner">

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
<?php $component->withAttributes(['isActive' => true]); ?>МегаДоктора <?php echo $__env->renderComponent(); ?>
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

            <div class="filter doctors-page__filter">
                <div class="filter__wrapper">
                    <input
                        wire:model.debounce.500ms="search"
                        class="filter__input mb-3"
                        type="text"
                        placeholder="Поиск по имени"
                    >

                    <div
                        wire:ignore
                        class="diagnostics-select"
                    >
                        <select id="diagnostics-select2" class="js-states form-control">
                            <option selected value="">Все специальности</option>
                            <?php $__currentLoopData = $specialitiesList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $speciality): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($speciality->id, false); ?>"><?php echo e($speciality->plural_name, false); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                </div>
            </div>

            <div class="doctors-page__list">
                <?php $__currentLoopData = $specialities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $speciality): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <section id="<?php echo e($speciality->id, false); ?>" class="doctors-section <?php echo e($loop->first ? 'section-top-space' : '', false); ?>">
                        <h3 class="doctors-section__title section-title">
                            <a href="<?php echo e(route('doctors.speciality', $speciality), false); ?>" ><?php echo e($speciality->plural_name, false); ?></a>
                        </h3>

                        <div class="doctors-section__list">

                            <?php $__currentLoopData = $speciality->doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a class="person person--link doctors__person"  href="<?php echo e(route('doctors.show', $doctor->slug), false); ?>">
                                    <img
                                        class="person__photo img-fluid"
                                        src="<?php echo e($doctor->getFirstMediaUrl('photo'), false); ?>"
                                        alt="<?php echo e($doctor->full_name, false); ?>"
                                    >
                                    <div class="person__info">
                                        <h4 class="person__name" itemprop = "employee" >
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
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>


        </div>
    </div>
</div>
<?php /**PATH /var/www/resources/views/livewire/pages/doctors-page.blade.php ENDPATH**/ ?>