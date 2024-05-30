<button <?php echo e($attributes->merge(['class' => 'accordion-button']), false); ?>

        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#flush-collapseOne" aria-expanded="false"
        aria-controls="flush-collapseOne"><?php echo e($slot, false); ?></button>
<?php /**PATH /var/www/resources/views/components/accordion/button.blade.php ENDPATH**/ ?>