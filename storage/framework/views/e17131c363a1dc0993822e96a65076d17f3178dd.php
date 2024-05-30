<button
    <?php echo e($attributes->class(['btn btn-primary'])
        ->merge(['type' => 'button']), false); ?>

>
    <?php echo e($slot, false); ?>

</button>
<?php /**PATH /var/www/vendor/moonshine/moonshine/resources/views/components/form/button.blade.php ENDPATH**/ ?>