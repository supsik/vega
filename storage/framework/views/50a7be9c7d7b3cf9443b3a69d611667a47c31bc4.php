

<?php $__env->startSection('title', $page->seo_title ?? config('app.name')); ?>
<?php $__env->startSection('description', $page->seo_description); ?>
<?php $__env->startSection('keywords', $page->seo_keywords); ?>

<?php $__env->startSection('content'); ?>
    <?php if($homeSlider->count()): ?>
        <section class="home-carousel">
            <div class="container-fluid">
                <div class="home-carousel__inner">
                    <div id="carousel-home" class="home-carousel__wrapper carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">

                            <?php $__currentLoopData = $homeSlider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="carousel-item <?php echo e($loop->first ? 'active' : '', false); ?>">
                                    <div class="home-carousel__item">
                                        <a class="home-carousel__bg" href="<?php echo e($slide->link ?? 'javascript:void(0)', false); ?>">
                                            <img class="home-carousel__bg-desktop"
                                                 src="<?php echo e($slide->getFirstMediaUrl('desktop_image'), false); ?>"
                                                 alt="<?php echo e($slide->title, false); ?>">
                                            <a class="home-carousel__bg home-carousel__bg-mobile"
                                               href="<?php echo e($slide->link ?? 'javascript:void(0)', false); ?>">
                                                <img
                                                    src="<?php echo e($slide->getFirstMediaUrl('mobile_image'), false); ?>"
                                                    alt="<?php echo e($slide->title, false); ?>">
                                            </a>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    </div>

                    <?php if($homeSlider->count() > 1): ?>
                        <div class="carousel-control home-carousel__controls">
                            <button class="carousel-btn carousel-btn--prev home-carousel__prev-btn" type="button"
                                    data-bs-target="#carousel-home" data-bs-slide="prev"></button>
                            <button class="carousel-btn home-carousel__next-btn" type="button"
                                    data-bs-target="#carousel-home"
                                    data-bs-slide="next"></button>
                        </div>
                    <?php endif; ?>

                </div>
            </div>

        </section>

    <?php endif; ?>


    <section class="about-section section-top-space">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-8 col-md-9">
                    <?php if($page->first_block_text || $page->second_block_text): ?>
                        <div class="about-section__text about-section__text--dots">
                            <div class="about-section__text-column">
                                <?php echo $page->first_block_text; ?>

                            </div>
                            <div class="about-section__text-column">
                                <?php echo $page->second_block_text; ?>

                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <section class = "services">
        <div class = "container-fluid">
            <h2 class = "services__h2">Услуги</h2>
            <div class="row gy-3 gy-3 gx-3 gy-lg-4 gx-lg-4">
            <?php if($diagnostics->count()): ?>
                <?php $__currentLoopData = $diagnostics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $diagnostic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class = "col-12 col-md-4 col-lg-3">
                        <a class="services-card"
                            href="<?php echo e(route('diagnostics.show', $diagnostic), false); ?>"
                            data-animation ="<?php echo e($diagnostic->getFirstMediaUrl('animation'), false); ?>"
                            >
                            <div>
                                <p class = "services-card__name"><?php echo e($diagnostic->name, false); ?></p>
                                <p class = "services-card__description"><?php echo e(mb_strimwidth(
                                    strip_tags($diagnostic->description), 0, 80, "..."
                                ), false); ?></p>
                            </div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>

    </section>

    <div onclick ="megaScroll.ScrollTop()" class ="g-btn-up">
        <svg width="62" height="62" viewBox="0 0 62 62" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="1.5" y="1.5" width="59" height="59" rx="14.5" fill="#E8F0D1" stroke="#A1BF3E" stroke-width="3"/>
            <path d="M15 37L30.5 25L46 37" stroke="#3C515C" stroke-width="3" stroke-linecap="round"/>
        </svg>
    </div>

    <?php if($reviews->count()): ?>
        <section class="text-carousel section-top-space">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="text-carousel__left">
                            <h2 class="text-carousel__title section-title">
                                Пациенты
                                <span>
                                    о нас
                                </span>
                            </h2>
                            <?php if($reviews->count() > 1): ?>
                                <div class="text-carousel__controls">
                                    <button
                                        class="carousel-btn carousel-btn--prev text-carousel__prev-btn"
                                        type="button"
                                        data-bs-target="#carousel-comments"
                                        data-bs-slide="prev"
                                    ></button>
                                    <button
                                        class="carousel-btn text-carousel__next-btn"
                                        type="button"
                                        data-bs-target="#carousel-comments"
                                        data-bs-slide="next"
                                    ></button>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">

                        <div id="carousel-comments" class="text-carousel__wrapper carousel slide"
                             data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="carousel-item <?php echo e($loop->first ? 'active' : '', false); ?>">
                                        <div class="text-carousel__item">
                                            <h4 class="text-carousel__author">
                                                <?php echo e($review->author, false); ?>

                                            </h4>
                                            <p class="text-carousel__text">
                                                <?php echo e($review->text, false); ?>

                                            </p>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if($news->count()): ?>
        <section class="news section-top-space">
            <div class="container-fluid">
                <h2 class="section-title">Новости клиники</h2>

                <div class="row gy-4">

                    <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $newsItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-12 col-sm-6 col-md-4" itemscope itemtype="https://schema.org/NewsArticle" >
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.news.index','data' => ['link' => route('news.show', $newsItem)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('news'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['link' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('news.show', $newsItem))]); ?>
                                 <?php $__env->slot('head', null, []); ?> 
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.news.thumbnail','data' => ['url' => $newsItem->getFirstMediaUrl('cover'),'title' => $newsItem->title]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('news.thumbnail'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($newsItem->getFirstMediaUrl('cover')),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($newsItem->title)]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.news.date','data' => ['value' => $newsItem->published_at]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('news.date'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($newsItem->published_at)]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                 <?php $__env->endSlot(); ?>

                                 <?php $__env->slot('body', null, []); ?> 
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.news.title','data' => ['value' => $newsItem->title]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('news.title'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($newsItem->title)]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.news.excerpt','data' => ['value' => $newsItem->excerpt]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('news.excerpt'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($newsItem->excerpt)]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                 <?php $__env->endSlot(); ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
        </section>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/home.blade.php ENDPATH**/ ?>