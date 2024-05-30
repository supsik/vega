<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'type' => 'default',
    'content' => '',
    'showOnCreate' => true
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'type' => 'default',
    'content' => '',
    'showOnCreate' => true
]); ?>
<?php foreach (array_filter(([
    'type' => 'default',
    'content' => '',
    'showOnCreate' => true
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php if($showOnCreate): ?>
<div x-data
     x-init="$nextTick(() => { $dispatch('toast', {type: '<?php echo e($type, false); ?>', text: '<?php echo e($content, false); ?>'}) })"
></div>
<?php else: ?>
    <div x-data="{ show(){$dispatch('toast', {type: '<?php echo e($type, false); ?>', text: '<?php echo e($content, false); ?>'})} }">
        <?php echo e($slot, false); ?>

    </div>
<?php endif; ?>

<?php if (! $__env->hasRenderedOnce('02c2fe4e-3fc8-47d8-8b5c-9829598aa1a1')): $__env->markAsRenderedOnce('02c2fe4e-3fc8-47d8-8b5c-9829598aa1a1');
$__env->startPush('scripts'); ?>
    <div x-data="toasts()" class="toast-container" @toast.window="add($event.detail)">
        <template x-for="toast of toasts" :key="toast.id">
            <div
                x-show="visible.includes(toast)"
                x-transition:enter="transition ease-in duration-200"
                x-transition:enter-start="transform opacity-0 translate-y-2"
                x-transition:enter-end="transform opacity-100"
                x-transition:leave="transition ease-out duration-500"
                x-transition:leave-start="transform translate-x-0 opacity-100"
                x-transition:leave-end="transform translate-x-full opacity-0"
                @click="remove(toast.id)"
                class="toast-item"
                :class="{
                    'toast-success': toast.type === 'success',
                    'toast-info': toast.type === 'info',
                    'toast-warning': toast.type === 'warning',
                    'toast-error': toast.type === 'error',
                }"
                x-text="toast.text"
            ></div>
        </template>
    </div>
<?php $__env->stopPush(); endif; ?>

<?php /**PATH /var/www/vendor/moonshine/moonshine/resources/views/components/toast.blade.php ENDPATH**/ ?>