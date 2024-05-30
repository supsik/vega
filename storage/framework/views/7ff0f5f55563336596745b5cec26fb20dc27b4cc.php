<?php echo $__env->make('moonshine::fields.belongs-to-many', [
    'element' => $element,
    'resource' => $resource,
    'item' => $item,
    'model' => $resource->getModel()
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /var/www/vendor/moonshine/moonshine/resources/views/filters/belongs-to-many.blade.php ENDPATH**/ ?>