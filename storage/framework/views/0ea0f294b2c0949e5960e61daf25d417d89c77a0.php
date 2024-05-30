<div class="tinymce">
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'moonshine::components.form.textarea','data' => ['attributes' => $element->attributes()->merge([
            'name' => $element->name()
        ])->except('x-bind:id'),':id' => '$id(\'tiny-mce\')','xData' => 'tinymce()','dataLanguage' => !empty($element->locale) ? $element->locale : app()->getLocale(),'dataPlugins' => trim($element->plugins . ' ' . $element->addedPlugins),'dataMenubar' => trim($element->menubar),'dataToolbar' => trim($element->toolbar . ' ' . $element->addedToolbar),'dataTinycommentsMode' => !empty($element->commentAuthor) ? 'embedded' : null,'dataTinycommentsAuthor' => !empty($element->commentAuthor) ? $element->commentAuthor : null,'dataMergetagsList' => !empty($element->mergeTags) ? json_encode($element->mergeTags) : null,'dataFileManager' => config('moonshine.tinymce.file_manager', false) ? config('moonshine.tinymce.file_manager', 'laravel-filemanager') : null]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('moonshine::form.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($element->attributes()->merge([
            'name' => $element->name()
        ])->except('x-bind:id')),':id' => '$id(\'tiny-mce\')','x-data' => 'tinymce()','data-language' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(!empty($element->locale) ? $element->locale : app()->getLocale()),'data-plugins' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trim($element->plugins . ' ' . $element->addedPlugins)),'data-menubar' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trim($element->menubar)),'data-toolbar' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trim($element->toolbar . ' ' . $element->addedToolbar)),'data-tinycomments_mode' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(!empty($element->commentAuthor) ? 'embedded' : null),'data-tinycomments_author' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(!empty($element->commentAuthor) ? $element->commentAuthor : null),'data-mergetags_list' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(!empty($element->mergeTags) ? json_encode($element->mergeTags) : null),'data-file_manager' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(config('moonshine.tinymce.file_manager', false) ? config('moonshine.tinymce.file_manager', 'laravel-filemanager') : null)]); ?><?php echo $element->formViewValue($item) ?? ''; ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
</div>
<?php /**PATH /var/www/vendor/moonshine/moonshine/resources/views/fields/tinymce.blade.php ENDPATH**/ ?>