<div class="flex items-center justify-end gap-2">
    <?php echo $__env->make('moonshine::crud.shared.item-actions', [
        'resource' => $resource,
        'except' => []
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php /**PATH /var/www/vendor/moonshine/moonshine/resources/views/crud/shared/table-row-actions.blade.php ENDPATH**/ ?>