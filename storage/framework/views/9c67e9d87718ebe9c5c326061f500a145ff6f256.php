<?php echo $__env->make('moonshine::fields.' . (method_exists($element, 'isSelect') && $element->isSelect() ? 'select' : 'multi-checkbox'), [
    'element' => $element,
    'resource' => $resource,
    'item' => $item,
    'model' => $element->formViewValue($item) ?? $resource->getModel()
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /var/www/vendor/moonshine/moonshine/resources/views/fields/belongs-to-many.blade.php ENDPATH**/ ?>