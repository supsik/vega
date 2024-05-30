<div <?php echo e($attributes->merge(['class' => 'accordion-collapse collapse']), false); ?> id="flush-collapseOne"
     aria-labelledby="flush-headingOne"
     data-bs-parent="#accordionFlushExample"
>
    <div class="accordion-body appointment-page__scroll">
        <?php echo e($slot, false); ?>

    </div>
</div>
<?php /**PATH /var/www/resources/views/components/accordion/body.blade.php ENDPATH**/ ?>