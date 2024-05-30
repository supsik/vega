<div
    x-init="setTimeout(function() {$refs.alert.remove()}, 5000)"
    x-data=""
    x-ref="alert"
>
    <?php if($flash = flash()->get()): ?>
        <div class="<?php echo e($flash->classes(), false); ?> flash alert  alert-dismissible fade show text-center" role="alert">
            <?php echo e($flash->message(), false); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
</div>



<?php /**PATH /var/www/resources/views/livewire/flash.blade.php ENDPATH**/ ?>