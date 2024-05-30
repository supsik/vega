<!-- User menu -->
<div class="mt-2 border-t border-dark-200">
    <div class="menu-profile">
        <a href="<?php echo e(route('moonshine.custom_page', 'profile'), false); ?>" class="menu-profile-main">
            <div class="menu-profile-photo">
                <img class="h-full w-full object-cover"
                     src="<?php echo e(auth()->user()->{config('moonshine.auth.fields.avatar', 'avatar')}
                        ? (Storage::disk(config('moonshine.disk', 'public'))->url(auth()->user()->{config('moonshine.auth.fields.avatar', 'avatar')}))
                        : ("https://ui-avatars.com/api/?name=" . auth()->user()->{config('moonshine.auth.fields.name', 'name')}), false); ?>"
                     alt="<?php echo e(auth()->user()->{config('moonshine.auth.fields.name', 'name')}, false); ?>"
                />
            </div>
            <div class="menu-profile-info">
                <h5 class="name"><?php echo e(auth()->user()->{config('moonshine.auth.fields.name', 'name')}, false); ?></h5>
                <div class="email"><?php echo e(auth()->user()->{config('moonshine.auth.fields.username', 'email')}, false); ?></div>
            </div>
        </a>

        <a href="<?php echo e(route('moonshine.logout'), false); ?>" class="menu-profile-exit" title="Logout">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'moonshine::components.icon','data' => ['icon' => 'heroicons.power','color' => 'gray','size' => '6']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('moonshine::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'heroicons.power','color' => 'gray','size' => '6']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        </a>
    </div>
</div>
<?php /**PATH /var/www/vendor/moonshine/moonshine/resources/views/layouts/shared/profile.blade.php ENDPATH**/ ?>