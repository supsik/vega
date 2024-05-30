<?php if($resource->hasMassAction()): ?>
    <td colspan="<?php echo e(count($resource->getFields()->indexFields())+2, false); ?>"
    >
        <div class="flex items-center gap-4">
            <?php echo $__env->make('moonshine::crud.shared.bulk-actions', ['resource' => $resource], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </td>
<?php endif; ?>
<?php /**PATH /var/www/vendor/moonshine/moonshine/resources/views/crud/shared/table-foot.blade.php ENDPATH**/ ?>