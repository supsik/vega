<footer id="footer" class="footer">
    <div class="container-fluid">
        <div class="footer__inner">
            <div class="footer__left">
                <a class="footer__logo" href="<?php echo e(route('home'), false); ?>">
                    <img class="d-none d-lg-block align-text-top img-fluid" src="<?php echo e(Vite::image('logo-white.png'), false); ?>"
                         alt="Логотип">
                    <img class="d-block d-lg-none align-text-top img-fluid" src="<?php echo e(Vite::image('logo-white.png'), false); ?>"
                         alt="Логотип">
                </a>
                <ul class="footer__menu">
                        <li class="footer__menu-item">
                            <a class="footer__menu-link" href="<?php echo e(route('doctors.index'), false); ?>">
                                Первоклассные специалисты
                            </a>
                        </li>
                        <li class="footer__menu-item">
                            <a class="footer__menu-link" href="<?php echo e(route('pages', 'advanced-equipment'), false); ?>">
                                Передовое оборудование
                            </a>
                        </li>
                        <li class="footer__menu-item">
                            <a class="footer__menu-link" href="<?php echo e(route('prices'), false); ?>">
                                Стоимость услуг
                            </a>
                        </li>
                    </ul>
            </div>

            <div class="footer__right">
                <div class="footer__info">

                    <div class="footer-contact">
                        <a class="footer-contact__phone" href="tel:<?php echo e($variables->phone, false); ?>">
                            <?php echo e($variables->phone, false); ?>

                        </a>
                        <span class="footer-contact__address">
                            <?php echo e($variables->first_address, false); ?>

                        </span>
                        <span class="footer-contact__address">
                            <?php echo e($variables->second_address, false); ?>

                        </span>
                        <span class="footer-contact__info">
                            <?php echo e($variables->first_mode, false); ?>

                        </span>
                    </div>


                    <div class="footer-contact">
                        <a class="footer-contact__phone" href="mailto:<?php echo e($variables->contact_email, false); ?>">
                            <?php echo e($variables->contact_email, false); ?>

                        </a>
                    </div>

                    <div class="social-list footer__social">
                        <?php if($variables->vk_link): ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.social-link','data' => ['link' => $variables->vk_link,'icon' => 'vk']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('social-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['link' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($variables->vk_link),'icon' => 'vk']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <?php endif; ?>

                        <?php if($variables->tg_link): ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.social-link','data' => ['link' => $variables->tg_link,'icon' => 'tg']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('social-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['link' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($variables->tg_link),'icon' => 'tg']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <?php endif; ?>

                        <?php if($variables->whatsapp_link): ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.social-link','data' => ['link' => $variables->whatsapp_link,'icon' => 'whatsapp']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('social-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['link' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($variables->whatsapp_link),'icon' => 'whatsapp']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="footer__map map">
                    <div class="map__iframe">
                        <?php if($variables->ya_map): ?>
                            <?php echo $variables->ya_map; ?>

                        <?php endif; ?>
                    </div>

                    <?php if($variables->ya_link): ?>
                        <a href="<?php echo e($variables->ya_link, false); ?>" class="map__link">Открыть на Яндекс картах</a>
                    <?php endif; ?>

                    <div class="footer__copyright">
                        <span class="footer__copyright-text">
                            Copyright Клиника VEGA, <?php echo e(date('Y'), false); ?>

                        </span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</footer>
<?php /**PATH /var/www/resources/views/partials/footer.blade.php ENDPATH**/ ?>