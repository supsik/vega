<a href="<?php echo e(route('moonshine.index'), false); ?>" class="block" rel="home">
        <img src="<?php echo e(config('moonshine.logo') ?: asset('vendor/moonshine/logo.svg'), false); ?>"
             class="hidden h-14 xl:block"
             :class="minimizedMenu && '!hidden'"
             alt="<?php echo e(config('moonshine.title'), false); ?>"
        />
        <img src="<?php echo e(config('moonshine.logo_small') ?: asset('vendor/moonshine/logo-small.svg'), false); ?>"
             class="block h-8 lg:h-10 xl:hidden"
             :class="minimizedMenu && '!block'"
             alt="<?php echo e(config('moonshine.title'), false); ?>"
        />
</a>
<?php /**PATH /var/www/vendor/moonshine/moonshine/resources/views/layouts/shared/logo.blade.php ENDPATH**/ ?>