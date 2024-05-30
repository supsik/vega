<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['extension']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['extension']); ?>
<?php foreach (array_filter((['extension']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<div class="expansion flex bg-green-500" type="button">
    <span x-bind:class="charCount < maxCount ? 'text-green-600' : 'text-pink-600'"  x-text="charCount"></span> / <span class="text-pink-600" x-text="maxCount"></span>
</div>


<?php /**PATH /var/www/resources/views/components/input-extensions/char-count.blade.php ENDPATH**/ ?>