<?php if(config('moonshine.socialite')): ?>
    <div class="social">
        <div class="social-divider"><?php echo e($title ?? '', false); ?></div>
        <div class="social-list">
            <?php $__currentLoopData = config('moonshine.socialite'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $driver => $src): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('moonshine.socialite.redirect', $driver), false); ?>" class="social-item">
                    <img class="h-6 w-6"
                         src="<?php echo e($src, false); ?>"
                         alt="<?php echo e($driver, false); ?>"
                    >
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <?php if($attached ?? false): ?>
        <?php if(auth()->user()?->moonshineSocialites?->isNotEmpty()): ?>
        <div class="social">
            <div class="social-divider"><?php echo app('translator')->get('moonshine::ui.resource.linked_socialite'); ?></div>
            <div class="social-list">
                <?php $__currentLoopData = auth()->user()->moonshineSocialites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $socials): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($socials->driver, false); ?> - <?php echo e($socials->identity, false); ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <?php endif; ?>
    <?php endif; ?>
<?php endif; ?>
<?php /**PATH /var/www/vendor/moonshine/moonshine/resources/views/ui/social-auth.blade.php ENDPATH**/ ?>