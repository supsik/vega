<!-- Footer -->
<?php if(!empty(config('moonshine.footer.copyright')) || !empty(config('moonshine.footer.nav'))): ?>
    <footer class="layout-footer">
        <div class="flex flex-col flex-wrap items-center justify-between gap-y-4 gap-x-8 md:flex-row">
            <?php if(!empty(config('moonshine.footer.copyright'))): ?>
                <div class="text-center text-2xs text-slate-500 md:text-left">
                    &copy; 2021-<?php echo e(date('Y'), false); ?>. <?php echo config('moonshine.footer.copyright'); ?>

                </div>
            <?php endif; ?>
            <?php if(!empty(config('moonshine.footer.nav'))): ?>
                <?php if(is_string(config('moonshine.footer.nav'))): ?>
                    <nav class="text-center text-2xs text-slate-500 md:text-left">
                        <?php echo config('moonshine.footer.nav'); ?>

                    </nav>
                <?php elseif(is_iterable(config('moonshine.footer.nav'))): ?>
                    <nav class="flex flex-wrap justify-center gap-x-4 gap-y-2 md:justify-start lg:gap-x-6">
                        <?php $__currentLoopData = config('moonshine.footer.nav'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $url => $text): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e($url, false); ?>" class="text-2xs text-slate-500 hover:text-purple"
                               target="_blank"><?php echo $text; ?></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </nav>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </footer>
<?php endif; ?>
<!-- END: Footer -->
<?php /**PATH /var/www/vendor/moonshine/moonshine/resources/views/layouts/shared/footer.blade.php ENDPATH**/ ?>