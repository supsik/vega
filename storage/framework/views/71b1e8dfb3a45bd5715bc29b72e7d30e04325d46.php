<div <?php echo e($attributes->only('class')->class('contact-form'), false); ?>>

    <?php if(session()->has('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session()->get('success'), false); ?>

        </div>
    <?php endif; ?>


    <form <?php echo e($attributes->except('class'), false); ?>>
        <?php echo csrf_field(); ?>

        <?php echo e($slot, false); ?>

    </form>
</div>
<?php /**PATH /var/www/resources/views/components/form/index.blade.php ENDPATH**/ ?>