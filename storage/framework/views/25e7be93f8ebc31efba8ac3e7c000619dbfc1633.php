<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'name',
    'price',
    'link' => '#',
    'isDisabled' => false,
    'href'
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'name',
    'price',
    'link' => '#',
    'isDisabled' => false,
    'href'
]); ?>
<?php foreach (array_filter(([
    'name',
    'price',
    'link' => '#',
    'isDisabled' => false,
    'href'
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>


<div class="price-list__item">

    <span class="price-list__item-name" itemprop="makesOffer">
        <?php if(isset($href) && $href != ''): ?>
            <a class="breadcrumb__link" href="<?php echo e($href, false); ?>">
                <?php echo e($name, false); ?>

            </a>
        <?php else: ?>
            <?php echo e($name, false); ?>

        <?php endif; ?>
    </span>

    <span class="price-list__item-cost" itemprop="priceRange">
        <?php echo e(price($price), false); ?>

    </span>
    <?php if($isDisabled): ?>
        <span class="price-list__item-disable" itemprop="description">
            <?php echo e($variables->service_disable_text, false); ?>

        </span>
    <?php elseif($link!= '#'): ?>
        <a class="price-list__item-btn btn btn-main" href="<?php echo e($link, false); ?>">Записаться</a>
    <?php else: ?>
        <span class="price-list__item-disable" itemprop="telephone" content ="8 (9094) 76-50-59">Запись по телефону 8 (9094) 76-50-59</span>
    <?php endif; ?>
</div>

<?php /**PATH /var/www/resources/views/components/price-list/item.blade.php ENDPATH**/ ?>