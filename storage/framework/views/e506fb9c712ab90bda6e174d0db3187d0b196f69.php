<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'tabs',
    'contents',
    'activeTab' => null
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'tabs',
    'contents',
    'activeTab' => null
]); ?>
<?php foreach (array_filter(([
    'tabs',
    'contents',
    'activeTab' => null
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php if($tabs): ?>
    <!-- Tabs -->
    <div <?php echo e($attributes->class(['tabs']), false); ?>

         x-data="{ activeTab: '<?php echo e($activeTab ?? array_key_first($tabs), false); ?>'}"
    >
        <!-- Tabs Buttons -->
        <ul class="tabs-list">
            <?php $__currentLoopData = $tabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tabId => $tabContent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="tabs-item">
                    <button
                        @click.prevent="activeTab = '<?php echo e($tabId, false); ?>'"
                        :class="{ '_is-active': activeTab === '<?php echo e($tabId, false); ?>' }"
                        class="tabs-button"
                        type="button"
                    >
                        <?php echo $tabContent; ?>

                    </button>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <!-- END: Tabs Buttons -->

        <!-- Tabs content -->
        <div class="tabs-content">
            <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tabId => $tabContent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div x-show="activeTab === '<?php echo e($tabId, false); ?>'" class="tab-panel" style="display: none">
                    <div class="tabs-body">
                        <?php echo $tabContent; ?>

                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <!-- END: Tabs content -->
    </div>
    <!-- END: Tabs -->
<?php endif; ?>
<?php /**PATH /var/www/vendor/moonshine/moonshine/resources/views/components/tabs.blade.php ENDPATH**/ ?>