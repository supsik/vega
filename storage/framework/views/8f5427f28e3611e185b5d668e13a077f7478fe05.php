<ul class="dropdown-menu">
    <?php $__currentLoopData = $actions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="dropdown-menu-item">
            <?php echo $action->render(); ?>

        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php /**PATH /var/www/vendor/moonshine/moonshine/resources/views/crud/shared/dropdown-actions.blade.php ENDPATH**/ ?>