<div class="flex items-center gap-2">
<?php $__currentLoopData = $actions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php echo $action->render(); ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH /var/www/vendor/moonshine/moonshine/resources/views/crud/shared/line-actions.blade.php ENDPATH**/ ?>