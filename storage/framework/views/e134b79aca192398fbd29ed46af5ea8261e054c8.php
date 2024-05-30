<div class="account-page__form-wr _account-page__form-wr ">
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.index','data' => ['class' => 'account-page__form contact-form auth-password _auth-password d-none']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'account-page__form contact-form auth-password _auth-password d-none']); ?>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.input','data' => ['id' => 'login_phone','dataMaska' => '+7(###)###-##-##','dataMaskaTokens' => 'A:[A-Z]','dataValidate' => 'phone','oninput' => 'megaAuth.resetError(this)','label' => 'Номер телефона','type' => 'text','placeholder' => 'Введите номер телефона','autofocus' => true,'required' => true,'class' => '_password-input']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'login_phone','data-maska' => '+7(###)###-##-##','data-maska-tokens' => 'A:[A-Z]','data-validate' => 'phone','oninput' => 'megaAuth.resetError(this)','label' => 'Номер телефона','type' => 'text','placeholder' => 'Введите номер телефона','autofocus' => true,'required' => true,'class' => '_password-input']); ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        <div class="account-page__password-wr">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.input','data' => ['id' => 'login_password','oninput' => 'megaAuth.resetError(this)','label' => 'Пароль','dataValidate' => 'password','type' => 'password','placeholder' => 'Введите пароль','required' => true,'class' => '_account-page__password-input']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'login_password','oninput' => 'megaAuth.resetError(this)','label' => 'Пароль','data-validate' => 'password','type' => 'password','placeholder' => 'Введите пароль','required' => true,'class' => '_account-page__password-input']); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <div class="account-page__password">
                <div class="account-page__password-hide hidden" onclick="megaAuth.hidePassord()">
                    <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 10C4 10 5.6 15 12 15M12 15C18.4 15 20 10 20 10M12 15V18M18 17L16 14.5M6 17L8 14.5" stroke="#464455" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="account-page__password-show" onclick="megaAuth.showPassord()">
                <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 12C4 12 5.6 7 12 7M12 7C18.4 7 20 12 20 12M12 7V4M18 5L16 7.5M6 5L8 7.5M15 13C15 14.6569 13.6569 16 12 16C10.3431 16 9 14.6569 9 13C9 11.3431 10.3431 10 12 10C13.6569 10 15 11.3431 15 13Z" stroke="#464455" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                </div>
            </div>
        </div>

        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.button','data' => ['type' => 'button','onclick' => 'megaAuth.confirmPass(event)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'button','onclick' => 'megaAuth.confirmPass(event)']); ?>
            Войти
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>


        <div class="login-links d-none">
            <a id="login-forgot-link" href="#">Забыли пароль?</a>
            <a id="login-create-link" href="#">Создать аккаунт</a>
        </div>
        <div class ="account-page__form-error d-none">Что то пощло не так</div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <div class="auth-code _auth-code">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('phone-verification', [])->html();
} elseif ($_instance->childHasBeenRendered('l1083295618-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l1083295618-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l1083295618-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l1083295618-0');
} else {
    $response = \Livewire\Livewire::mount('phone-verification', []);
    $html = $response->html();
    $_instance->logRenderedChild('l1083295618-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
    <div class="account-page__form-checkbox">
        <span>Код</span>
        <div class="account-page__form-checkbox-wr" onclick="megaAuth.togle(this)">
            <input id="check-box__log-in" type="checkbox" />
            <label for="check-box__log-in"></label>
        </div>
        <span>Пароль</span>
    </div>
</div>
<?php /**PATH /var/www/resources/views/livewire/auth/login.blade.php ENDPATH**/ ?>