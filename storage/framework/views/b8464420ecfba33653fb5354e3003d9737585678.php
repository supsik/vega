

<?php $__env->startSection('title', 'Вход в личный кабинет - ' . config('app.name')); ?>

<?php $__env->startSection('content'); ?>
    <div class="account-page">
        <div class="container-fluid">
            <div class="account-page__inner">

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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.breadcrumbs.item','data' => ['isActive' => true,'isLarge' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('breadcrumbs.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['isActive' => true,'isLarge' => true]); ?>Личный кабинет <?php echo $__env->renderComponent(); ?>
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


                <div class="account-page__forms section-top-space">
                    <div class="row">
                        <div class="col-12 offset-md-2 col-md-8">

                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                            aria-selected="true" data-name="entrance" onclick="megaAuth.getFormName(this)">Вход
                                    </button>
                                    <button class="nav-link nav-link-create" id="nav-profile-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-profile" type="button" role="tab"
                                            aria-controls="nav-profile" aria-selected="false" data-name="reg" 
                                            onclick="megaAuth.getFormName(this)">Регистрация
                                    </button>
                                    <button class="nav-link nav-link-forgot" id="nav-contact-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-contact" type="button" role="tab"
                                            aria-controls="nav-contact" aria-selected="false" data-name="reset" 
                                            onclick="megaAuth.getFormName(this)">Сбросить пароль
                                    </button>
                                </div>
                            </nav>


                            <div class="tab-content" id="nav-tabContent">

                                <div class="tab-pane fade show active selected-tab" id="nav-home" role="tabpanel"
                                     aria-labelledby="nav-home-tab" tabindex="0">
                                    
                                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('auth.register', ['showAuthForm' => '1','redirect' => '1'])->html();
} elseif ($_instance->childHasBeenRendered('8l3kXVK')) {
    $componentId = $_instance->getRenderedChildComponentId('8l3kXVK');
    $componentTag = $_instance->getRenderedChildComponentTagName('8l3kXVK');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('8l3kXVK');
} else {
    $response = \Livewire\Livewire::mount('auth.register', ['showAuthForm' => '1','redirect' => '1']);
    $html = $response->html();
    $_instance->logRenderedChild('8l3kXVK', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

                                </div>

                                <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                     aria-labelledby="nav-profile-tab" tabindex="0">
                                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('auth.register', ['showRegistrationForm' => '0'])->html();
} elseif ($_instance->childHasBeenRendered('kPxzh5u')) {
    $componentId = $_instance->getRenderedChildComponentId('kPxzh5u');
    $componentTag = $_instance->getRenderedChildComponentTagName('kPxzh5u');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('kPxzh5u');
} else {
    $response = \Livewire\Livewire::mount('auth.register', ['showRegistrationForm' => '0']);
    $html = $response->html();
    $_instance->logRenderedChild('kPxzh5u', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('auth.register', ['showRegistrationForm' => '1'])->html();
} elseif ($_instance->childHasBeenRendered('Oc6Nt9g')) {
    $componentId = $_instance->getRenderedChildComponentId('Oc6Nt9g');
    $componentTag = $_instance->getRenderedChildComponentTagName('Oc6Nt9g');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Oc6Nt9g');
} else {
    $response = \Livewire\Livewire::mount('auth.register', ['showRegistrationForm' => '1']);
    $html = $response->html();
    $_instance->logRenderedChild('Oc6Nt9g', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                </div>

                                <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                     aria-labelledby="nav-contact-tab" tabindex="0">
                                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('auth.forgot-password', [])->html();
} elseif ($_instance->childHasBeenRendered('bb5pVI4')) {
    $componentId = $_instance->getRenderedChildComponentId('bb5pVI4');
    $componentTag = $_instance->getRenderedChildComponentTagName('bb5pVI4');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('bb5pVI4');
} else {
    $response = \Livewire\Livewire::mount('auth.forgot-password', []);
    $html = $response->html();
    $_instance->logRenderedChild('bb5pVI4', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.index','data' => ['class' => 'account-page__form account-page__detail contact-form  d-none']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'account-page__form account-page__detail contact-form  d-none']); ?>
                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.input','data' => ['oninput' => 'megaAuth.resetError(this)','label' => 'Пароль','dataValidate' => 'password','type' => 'password','id' => 'register_password','placeholder' => 'Введите пароль','required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['oninput' => 'megaAuth.resetError(this)','label' => 'Пароль','data-validate' => 'password','type' => 'password','id' => 'register_password','placeholder' => 'Введите пароль','required' => true]); ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.input','data' => ['id' => 'register_password_confirmation','oninput' => 'megaAuth.resetError(this)','label' => 'Повтор пароля','dataValidate' => 'secPas','onchange' => 'megaAuth.repetPassword(this)','type' => 'password','placeholder' => 'Повторите пароль','required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'register_password_confirmation','oninput' => 'megaAuth.resetError(this)','label' => 'Повтор пароля','data-validate' => 'secPas','onchange' => 'megaAuth.repetPassword(this)','type' => 'password','placeholder' => 'Повторите пароль','required' => true]); ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.button','data' => ['type' => 'button','onclick' => 'megaAuth.reset(event)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'button','onclick' => 'megaAuth.reset(event)']); ?>
                                            Создать
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                        <div class="account-page__form-error d-none">Что то пошло не так</div>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/account.blade.php ENDPATH**/ ?>