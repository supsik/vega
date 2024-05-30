<div x-data="{ open : false, src : ''}">
    <template
        @img-popup.window="open = true; src = $event.detail.src;"
        x-if="open"
        x-teleport="body"
    >
        <div class="modal-template">
            <div
                x-show="open"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 -translate-y-10"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 -translate-y-10"
                class="modal"
                aria-modal="true"
                role="dialog"
                @click.self="open=false"
            >
                <div class="modal-dialog modal-dialog-auto">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"></h5>
                            <button type="button"
                                    class="btn btn-close"
                                    @click.stop="open=false"
                                    aria-label="Close"
                            >
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'moonshine::components.icon','data' => ['icon' => 'heroicons.x-mark','size' => '6']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('moonshine::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'heroicons.x-mark','size' => '6']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            </button>
                        </div>
                        <div class="modal-body">
                            <img @click.outside="open = false"
                                 src=""
                                 :src="src"
                                 alt=""
                            />
                        </div>
                    </div>
                </div>
            </div>
            <div x-show="open" x-transition.opacity class="modal-backdrop"></div>
        </div>
    </template>
</div>
<?php /**PATH /var/www/vendor/moonshine/moonshine/resources/views/ui/img-popup.blade.php ENDPATH**/ ?>