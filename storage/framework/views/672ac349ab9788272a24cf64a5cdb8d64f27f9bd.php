<!-- Menu -->
<aside class="layout-menu" :class="minimizedMenu && '_is-minimized'">
    <div class="menu-heading">
        <div class="menu-heading-logo">
            <?php echo $__env->make('moonshine::layouts.shared.logo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <div class="menu-heading-actions">
            <div class="menu-heading-mode">
                <?php echo $__env->make('moonshine::layouts.shared.theme-switcher', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <div class="menu-heading-burger">
                <button type="button" @click.prevent="asideMenuOpen = ! asideMenuOpen" class="text-white hover:text-pink">
                    <svg x-show="!asideMenuOpen" style="display: none" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-8 w-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <svg x-show="asideMenuOpen" style="display: none" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-8 w-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <?php $__env->startSection("sidebar-inner"); ?>
    <?php echo $__env->yieldSection(); ?>

    <nav class="menu" :class="asideMenuOpen && '_is-opened'">
        <!-- Main menu -->
        <?php if (isset($component)) { $__componentOriginalbb13a9ec530944dc144ab13ebdcc88e3b90f3944 = $component; } ?>
<?php $component = MoonShine\Components\MenuComponent::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('moonshine::menu-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(MoonShine\Components\MenuComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbb13a9ec530944dc144ab13ebdcc88e3b90f3944)): ?>
<?php $component = $__componentOriginalbb13a9ec530944dc144ab13ebdcc88e3b90f3944; ?>
<?php unset($__componentOriginalbb13a9ec530944dc144ab13ebdcc88e3b90f3944); ?>
<?php endif; ?>

        <?php echo $__env->renderWhen(
            config('moonshine.auth.enable', true),
            'moonshine::layouts.shared.profile'
        , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

        <!-- Bottom menu -->
        <div <?php if(config('moonshine.auth.enable', true)): ?> class="border-t border-dark-200" <?php endif; ?>>
            <ul class="menu-inner mt-2">
                <li class="menu-inner-item hidden xl:block">
                    <button type="button" x-data="navTooltip" @mouseenter="toggleTooltip()" @click.prevent="minimizedMenu = ! minimizedMenu" class="menu-inner-button outline-none">
                        <svg x-show="!minimizedMenu" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 9l-3 3m0 0l3 3m-3-3h7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <svg x-show="minimizedMenu" style="display: none" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 15l3-3m0 0l-3-3m3 3h-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="menu-inner-text" x-show="!minimizedMenu">
                            <?php echo app('translator')->get('moonshine::ui.collapse_menu'); ?>
                        </span>
                    </button>
                </li>
            </ul>
        </div>
    </nav>
</aside>
<!-- END: Menu -->
<?php /**PATH /var/www/vendor/moonshine/moonshine/resources/views/layouts/shared/sidebar.blade.php ENDPATH**/ ?>