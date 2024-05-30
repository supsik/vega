<?php $__env->startSection('title', 'Запись on-line - ' . config('app.name')); ?>

<div class="appointment-page">
	<div class="container-fluid">
		<div class="appointment-page__inner">

			<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.breadcrumbs.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('breadcrumbs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
				<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.breadcrumbs.item','data' => ['isActive' => true,'isDark' => true,'isLarge' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('breadcrumbs.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['isActive' => true,'isDark' => true,'isLarge' => true]); ?>Запись on-line <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
			 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

			<div class="appointment-page__list section-top-space">

				<div class="appointment-page__select <?php echo e($this->mode != '' ? 'hide' : '', false); ?>">
					<h2 class="appointment-page__list-title">Начните запись на прием с выбора МегаДоктора или услуги</h2>

					<div class="appointment-page__select-action">
						<button
							class="appointment-page__select-btn _doctor-select"
							data-action="doctors"
							wire:click="setMode('doctors')"
						>
							Выбрать МегаДоктора
						</button>
						<button
							class="appointment-page__select-btn _service-select"
							data-action="services"
							wire:click="setMode('services')">
							Выбрать услугу
						</button>
					</div>
				</div>
				<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.accordion.index','data' => ['id' => 'accordionFlushExample','class' => 'main-accordion '.e($this->mode != '' ? 'show' : '', false).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('accordion'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'accordionFlushExample','class' => 'main-accordion '.e($this->mode != '' ? 'show' : '', false).'']); ?>
					<div class="appointment-page__accordion <?php echo e($this->mode == 'services' ? 'show selected-tab' : '', false); ?>">

						<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.accordion.item','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('accordion.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
							<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.accordion.button','data' => ['class' => '
								'.e($currentStep !== 'step1' ? 'collapsed' : '', false).'

								'.e($selectedService?->exists ? 'selected' : '', false).' accordion-button--heading
								','wire:click' => 'edit(\'step1\')','wire:disabled' => 'disabled']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('accordion.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '
								'.e($currentStep !== 'step1' ? 'collapsed' : '', false).'

								'.e($selectedService?->exists ? 'selected' : '', false).' accordion-button--heading
								','wire:click' => 'edit(\'step1\')','wire:disabled' => 'disabled']); ?>
								<div class="accordion-button__select btn">
									<?php echo e($selectedService?->exists ? 'Назад' : '', false); ?>

								</div>
								<div class="accordion-button__step">Шаг 1</div>
								<span class="accordion-button__text"><?php echo e($selectedService?->exists ? "Услуга: $selectedService->title" : 'Выбрать услугу', false); ?></span>
								<div class="accordion-button__select btn" style="<?php echo e($selectedService?->exists ? 'display:none;' : '', false); ?>">
									<?php echo e($selectedService?->exists ? '' : 'Выбрать', false); ?>

								</div>
							 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

							<input class="<?php echo e($currentStep === 'step1' ? 'show' : '', false); ?> appointment-page__search-input search-form__input form-control" type="search" name="q" placeholder="Поиск по услугам..." required="" oninput="mega.searchServices(event)">

							<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.accordion.body','data' => ['id' => 'flush-collapseOne','class' => ''.e($currentStep === 'step1' ? 'show' : '', false).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('accordion.body'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'flush-collapseOne','class' => ''.e($currentStep === 'step1' ? 'show' : '', false).'']); ?>
								<div class="accordion accordion-flush" id="accordionFlushService">
									<?php if(!empty($services) && !is_object($services)): ?>
									<?php $__currentLoopData = $services['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<div class="accordion-item" data-position="<?php echo e($key + 1, false); ?>">
										<h2 class="accordion-header" id="flush-headingOne">
											<button class="accordion-button collapsed" type="button"
													data-bs-toggle="collapse"
													data-bs-target="#flush-collapse-<?php echo e($key, false); ?>"
													aria-expanded="false"
													aria-controls="flush-collapse-<?php echo e($key, false); ?>"
											>
												<?php echo e($service['name'], false); ?>

											</button>
										</h2>

										<div id="flush-collapse-<?php echo e($key, false); ?>"
										 class="accordion-collapse collapse"
										 aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushService">
											<div class="accordion-body">
												<section class="price-list">
													<?php $__currentLoopData = $service['diagnostics']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<div class="price-list__wrapper accordion-element">
															<div class="price-list__item">
																<span class="price-list__item-name accordion-element__name" itemprop="makesOffer" content ="<?php echo e($item['title'], false); ?>">
																	<?php echo e($item['title'], false); ?>

																</span>
																<span class="price-list__item-cost" itemprop="priceRange">
																	<?php echo e(price($item['price']), false); ?>

																</span>

																<?php if($item['is_disabled'] && !$service['hide_phone']): ?>
																	<div class="price-list__item-action">
																		<a href="tel:<?php echo e($variables->phone, false); ?>"class="price-list__item-disable" itemprop="telephone"><?php echo e($variables->phone, false); ?></a>
																	</div>
																<?php elseif(!$item['is_disabled']): ?>
																	<div class="price-list__item-action">
																		<button wire:click="selectService(<?php echo e($item['id'], false); ?>)"
																				class="price-list__item-btn btn btn-main">Выбрать
																		</button>
																	</div>
																<?php endif; ?>
															</div>
														</div>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</section>
											</div>
										</div>
									</div>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<div class="accordion-body">
												<section class="price-list">
													<?php $__currentLoopData = $services['diagnostics']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<div class="price-list__wrapper accordion-element">
															<div class="price-list__item">
																<span class="price-list__item-name accordion-element__name" itemprop="makesOffer" content ="<?php echo e($item['title'], false); ?>">
																	<?php echo e($item['title'], false); ?>

																</span>
																<span class="price-list__item-cost" itemprop="priceRange">
																	<?php echo e($item['price'], false); ?>

																</span>

																<div class="price-list__item-action">
																<?php if($item['is_disabled']): ?>
																	<a href="tel:<?php echo e($variables->phone, false); ?>"class="price-list__item-disable" itemprop="telephone" content ="<?php echo e($variables->phone, false); ?>">
																		<?php echo e($variables->phone, false); ?>

																	</a>
																<?php else: ?>
																	<button wire:click="selectService(<?php echo e($service['id'], false); ?>)"
																			class="price-list__item-btn btn btn-main">Выбрать
																	</button>
																<?php endif; ?>
																</div>
															</div>
														</div>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</section>
											</div>
										</div>
									<?php endif; ?>

								</div>
							 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
						 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

						<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.accordion.item','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('accordion.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
							<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.accordion.button','data' => ['class' => ''.e($currentStep !== 'step2' ? 'collapsed' : '', false).'

								'.e($selectedDoctor?->exists ? 'selected' : '', false).'

								accordion-button--heading','wire:click' => 'edit(\'step2\')','wire:disabled' => 'disabled']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('accordion.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => ''.e($currentStep !== 'step2' ? 'collapsed' : '', false).'

								'.e($selectedDoctor?->exists ? 'selected' : '', false).'

								accordion-button--heading','wire:click' => 'edit(\'step2\')','wire:disabled' => 'disabled']); ?>
								<div class="accordion-button__select btn">
									<?php echo e($selectedDoctor?->exists ? 'Назад' : '', false); ?>

								</div>
								<div class="accordion-button__step">Шаг 2</div>
								<span class="accordion-button__text"><?php echo e($selectedDoctor?->exists ? "МегаДоктор: $selectedDoctor->fullName" : 'Выбрать МегаДоктора', false); ?></span>

								<div class="accordion-button__select btn" style="<?php echo e($selectedDoctor?->exists ? 'display:none;' : '', false); ?>">
									<?php echo e($selectedDoctor?->exists ? '' : 'Выбрать', false); ?>

								</div>
							 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

							<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.accordion.body','data' => ['id' => 'flush-collapseOne','class' => ''.e($currentStep === 'step2' ? 'show' : '', false).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('accordion.body'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'flush-collapseOne','class' => ''.e($currentStep === 'step2' ? 'show' : '', false).'']); ?>
								<div class="appointment-page__doctors-list">
									<?php if(is_object($doctors)): ?>
									<?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<div class="appointment-doctor">
											<div class="appointment-doctor__info">
												<img
													class="appointment-doctor__photo img-fluid"
													src="<?php echo e($doctor->getFirstMediaUrl('photo'), false); ?>"
													alt="<?php echo e($doctor['second_name'], false); ?> <?php echo e($doctor['first_name'], false); ?> <?php echo e($doctor['last_name'], false); ?>"
												>
												<span class="appointment-doctor__name">
												<?php echo e($doctor['second_name'], false); ?> <?php echo e($doctor['first_name'], false); ?> <?php echo e($doctor['last_name'], false); ?>

											</span>
											</div>

											<button wire:click="selectDoctor(<?php echo e($doctor['id'], false); ?>)"
													class="appointment-doctor__btn btn btn-main">Выбрать
											</button>
										</div>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php endif; ?>
								</div>

							 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
						 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>


						<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.accordion.item','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('accordion.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
							<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.accordion.button','data' => ['class' => ''.e($currentStep !== 'step3' ? 'collapsed' : '', false).'

								'.e((!is_null($selectedTime) && !is_null($selectedDate)) ? 'selected' : '', false).'

								accordion-button--heading','wire:click' => 'edit(\'step3\')','wire:loading.attr' => 'disabled']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('accordion.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => ''.e($currentStep !== 'step3' ? 'collapsed' : '', false).'

								'.e((!is_null($selectedTime) && !is_null($selectedDate)) ? 'selected' : '', false).'

								accordion-button--heading','wire:click' => 'edit(\'step3\')','wire:loading.attr' => 'disabled']); ?>
								<div class="accordion-button__select btn">
									<?php echo e((!is_null($selectedTime) && !is_null($selectedDate)) ? 'Назад' : '', false); ?>

								</div>
								<div class="accordion-button__step">Шаг 3</div>
								<span class="accordion-button__text"><?php echo e((!is_null($selectedTime) && !is_null($selectedDate)) ? 'Время: ' . __date($selectedDate) . ' ' .  $selectedTime : 'Выбрать свободное время', false); ?></span>
								<div class="accordion-button__select btn" style="<?php echo e((!is_null($selectedTime) && !is_null($selectedDate)) ? 'display:none;' : '', false); ?>">
									<?php echo e((!is_null($selectedTime) && !is_null($selectedDate)) ? '' : 'Выбрать', false); ?>

								</div>
							 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

							<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.accordion.body','data' => ['id' => 'flush-collapseOne','class' => ''.e($currentStep === 'step3' ? 'show' : '', false).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('accordion.body'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'flush-collapseOne','class' => ''.e($currentStep === 'step3' ? 'show' : '', false).'']); ?>
								<?php if(!count($schedule_first) && !count($schedule_second)): ?>
									<span class="accordion-button__schedule-full">
										К сожалению, на ближайшую неделю запись к доктору полная.
										Пожалуйста, позвоните в колл-центр 8(8672)40-41-30,
										наши операторы подберут для Вас другое удобное время или включат в лист ожидания.
									</span>
								<?php endif; ?>

								<?php if(count($schedule_first)): ?>
									<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('schedule', ['title' => 'Запись в Клинику МЕГА на Доватора, 22','clinicId' => 1,'schedule' => $schedule_first,'doctor' => $selectedDoctor,'fromAppointment' => true])->html();
} elseif ($_instance->childHasBeenRendered('l3454337948-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l3454337948-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3454337948-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3454337948-0');
} else {
    $response = \Livewire\Livewire::mount('schedule', ['title' => 'Запись в Клинику МЕГА на Доватора, 22','clinicId' => 1,'schedule' => $schedule_first,'doctor' => $selectedDoctor,'fromAppointment' => true]);
    $html = $response->html();
    $_instance->logRenderedChild('l3454337948-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?></livewire:schedule>
								<?php endif; ?>

								<?php if(count($schedule_second)): ?>
									<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('schedule', ['title' => 'Запись в Клинику МЕГА на Весенней, 7А','clinicId' => 4,'schedule' => $schedule_second,'doctor' => $selectedDoctor,'fromAppointment' => true])->html();
} elseif ($_instance->childHasBeenRendered('l3454337948-1')) {
    $componentId = $_instance->getRenderedChildComponentId('l3454337948-1');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3454337948-1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3454337948-1');
} else {
    $response = \Livewire\Livewire::mount('schedule', ['title' => 'Запись в Клинику МЕГА на Весенней, 7А','clinicId' => 4,'schedule' => $schedule_second,'doctor' => $selectedDoctor,'fromAppointment' => true]);
    $html = $response->html();
    $_instance->logRenderedChild('l3454337948-1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?></livewire:schedule>
								<?php endif; ?>
							 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
						 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
						<?php if(!$currentUser): ?>
						<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.accordion.item','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('accordion.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
							<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.accordion.button','data' => ['class' => ''.e($currentStep === 'registration' && !$this->currentUser ? 'selected' : 'collapsed', false).'

									accordion-button--heading','disabled' => 'disabled']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('accordion.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => ''.e($currentStep === 'registration' && !$this->currentUser ? 'selected' : 'collapsed', false).'

									accordion-button--heading','disabled' => 'disabled']); ?>
							<?php if($currentStep != 'registration' && !$this->currentUser): ?>
								<div class="accordion-button__step">Шаг 4</div>
							<?php endif; ?>
							<span class="accordion-button__text">Вход</span>
							 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

							<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.accordion.body','data' => ['id' => 'flush-collapseOne','class' => ''.e($currentStep === 'registration' && !$this->currentUser ? 'show' : '', false).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('accordion.body'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'flush-collapseOne','class' => ''.e($currentStep === 'registration' && !$this->currentUser ? 'show' : '', false).'']); ?>
								<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('auth.register', ['successEventName' => 'registerSuccess','userMustNotExists' => '0','idNumber' => '1'])->html();
} elseif ($_instance->childHasBeenRendered('l3454337948-2')) {
    $componentId = $_instance->getRenderedChildComponentId('l3454337948-2');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3454337948-2');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3454337948-2');
} else {
    $response = \Livewire\Livewire::mount('auth.register', ['successEventName' => 'registerSuccess','userMustNotExists' => '0','idNumber' => '1']);
    $html = $response->html();
    $_instance->logRenderedChild('l3454337948-2', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
							 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
						 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
						<?php endif; ?>
					</div>

					<div class="appointment-page__accordion <?php echo e($this->mode == 'doctors' ? 'show selected-tab' : '', false); ?>">
						<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.accordion.item','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('accordion.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
							<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.accordion.button','data' => ['class' => '
								'.e($currentStep !== 'step1' ? 'collapsed' : '', false).'

								'.e($selectedDoctor?->exists ? 'selected' : '', false).'

								accordion-button--heading','wire:click' => 'edit(\'step1\')','wire:loading.attr' => 'disabled']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('accordion.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '
								'.e($currentStep !== 'step1' ? 'collapsed' : '', false).'

								'.e($selectedDoctor?->exists ? 'selected' : '', false).'

								accordion-button--heading','wire:click' => 'edit(\'step1\')','wire:loading.attr' => 'disabled']); ?>
								<div class="accordion-button__select btn">
									<?php echo e($selectedDoctor?->exists ? 'Назад' : '', false); ?>

								</div>
								<div class="accordion-button__step">Шаг 1</div>
								<span class="accordion-button__text"><?php echo e($selectedDoctor?->exists ? "МегаДоктор: $selectedDoctor->fullName" : 'Выбрать МегаДоктора', false); ?></span>
								<div class="accordion-button__select btn" style="<?php echo e($selectedDoctor?->exists ? 'display:none;' : '', false); ?>">
									<?php echo e($selectedDoctor?->exists ? '' : 'Выбрать', false); ?>

								</div>
							 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

							<input class="appointment-page__search-input search-form__input form-control <?php echo e($currentStep === 'step1' ? 'show' : '', false); ?>"
								type="search" name="q" placeholder="Поиск по докторам..." required="" oninput="mega.searchServices(event)">

							<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.accordion.body','data' => ['id' => 'flush-collapseOne','class' => ''.e($currentStep === 'step1' ? 'show' : '', false).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('accordion.body'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'flush-collapseOne','class' => ''.e($currentStep === 'step1' ? 'show' : '', false).'']); ?>
								<div class="accordion accordion-flush" id="accordionFlushCategory">
									<?php if(!empty($doctors) && !is_object($doctors)): ?>
										<?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<div class="accordion-item" data-position="<?php echo e($key, false); ?>">
											<h2 class="accordion-header" id="flush-headingOne">
												<button class="accordion-button collapsed" type="button"
														data-bs-toggle="collapse"
														data-bs-target="#flush-collapse-<?php echo e($key, false); ?>"
														aria-expanded="false"
														aria-controls="flush-collapse-<?php echo e($key, false); ?>"
												>
													<?php echo e($doctor['plural_name'], false); ?>

												</button>
											</h2>

											<div id="flush-collapse-<?php echo e($key, false); ?>"
												 class="accordion-collapse collapse"
												 aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushCategory">
												<div class="accordion-body">
													<div class="appointment-page__doctors-list">
														<?php $__currentLoopData = $doctor['doctors']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $person): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<div class="appointment-doctor accordion-element">
															<div class="appointment-doctor__info">
																<img
																	class="appointment-doctor__photo img-fluid"
																	src="<?php echo e($person['avatar'], false); ?>"
																	alt="<?php echo e($person['second_name'], false); ?> <?php echo e($person['first_name'], false); ?> <?php echo e($person['last_name'], false); ?>"
																>
																<span class="appointment-doctor__name accordion-element__name">
																<?php echo e($person['second_name'], false); ?> <?php echo e($person['first_name'], false); ?> <?php echo e($person['last_name'], false); ?>

																</span>
															</div>

															<button wire:click="selectDoctor(<?php echo e($person['id'], false); ?>)"
																	class="appointment-doctor__btn btn btn-main">Выбрать
															</button>
														</div>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													</div>
												</div>
											</div>
										</div>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php endif; ?>
								</div>
							 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
						 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

						<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.accordion.item','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('accordion.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
							<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.accordion.button','data' => ['class' => '
								'.e($currentStep !== 'step2' ? 'collapsed' : '', false).'

								'.e($selectedService?->exists ? 'selected' : '', false).'

								accordion-button--heading','wire:click' => 'edit(\'step2\')','wire:loading.attr' => 'disabled']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('accordion.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '
								'.e($currentStep !== 'step2' ? 'collapsed' : '', false).'

								'.e($selectedService?->exists ? 'selected' : '', false).'

								accordion-button--heading','wire:click' => 'edit(\'step2\')','wire:loading.attr' => 'disabled']); ?>
								<div class="accordion-button__select btn">
									<?php echo e($selectedService?->exists ? 'Назад' : '', false); ?>

								</div>
								<div class="accordion-button__step">Шаг 2</div>
								<span class="accordion-button__text"><?php echo e($selectedService?->exists ? "Услуга: $selectedService->title" : 'Выбрать услугу', false); ?></span>
								<div class="accordion-button__select btn" style="<?php echo e($selectedService?->exists ? 'display:none;' : '', false); ?>">
									<?php echo e($selectedService?->exists ? '' : 'Выбрать', false); ?>

								</div>
							 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
							<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.accordion.body','data' => ['id' => 'flush-collapseOne','class' => ''.e($currentStep === 'step2' ? 'show' : '', false).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('accordion.body'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'flush-collapseOne','class' => ''.e($currentStep === 'step2' ? 'show' : '', false).'']); ?>
								<section class="price-list">
									<?php if(is_object($services)): ?>
									<?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<div class="price-list__wrapper">
											<div class="price-list__item">
												<span class="price-list__item-name">
													<?php echo e($service['title'], false); ?>

												</span>
												<span class="price-list__item-cost">
													<?php echo e(price($service['price']), false); ?>

												</span>

												<div class="price-list__item-action">
												<?php if($service['is_disabled']): ?>
													<a href="tel:<?php echo e($variables->phone, false); ?>"class="price-list__item-disable" itemprop="telephone" content ="8 (8672) 40-41-30"><?php echo e($variables->phone, false); ?></a>
												<?php else: ?>
													<button wire:click="selectService(<?php echo e($service['id'], false); ?>)"
															class="price-list__item-btn btn btn-main">Выбрать
													</button>
												<?php endif; ?>
												</div>
											</div>
										</div>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php endif; ?>
								</section>
							 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
						 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

						<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.accordion.item','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('accordion.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
							<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.accordion.button','data' => ['class' => ''.e($currentStep !== 'step3' ? 'collapsed' : '', false).'

								'.e((!is_null($selectedTime) && !is_null($selectedDate)) ? 'selected' : '', false).'

								accordion-button--heading','wire:click' => 'edit(\'step3\')','wire:loading.attr' => 'disabled']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('accordion.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => ''.e($currentStep !== 'step3' ? 'collapsed' : '', false).'

								'.e((!is_null($selectedTime) && !is_null($selectedDate)) ? 'selected' : '', false).'

								accordion-button--heading','wire:click' => 'edit(\'step3\')','wire:loading.attr' => 'disabled']); ?>
								<div class="accordion-button__select btn">
									<?php echo e((!is_null($selectedTime) && !is_null($selectedDate)) ? 'Назад' : '', false); ?>

								</div>
								<div class="accordion-button__step">Шаг 3</div>
								<span class="accordion-button__text">
									<?php echo e((!is_null($selectedTime) && !is_null($selectedDate)) ? 'Время: ' . __date($selectedDate) . ' ' .  $selectedTime : 'Выбрать свободное время', false); ?>

								</span>
								<div class="accordion-button__select btn" style="<?php echo e((!is_null($selectedTime) && !is_null($selectedDate)) ? 'display:none;' : '', false); ?>">
									<?php echo e((!is_null($selectedTime) && !is_null($selectedDate)) ? '' : 'Выбрать', false); ?>

								</div>
							 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

							<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.accordion.body','data' => ['id' => 'flush-collapseOne','class' => ''.e($currentStep === 'step3' ? 'show' : '', false).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('accordion.body'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'flush-collapseOne','class' => ''.e($currentStep === 'step3' ? 'show' : '', false).'']); ?>
								<?php if(!count($schedule_first) && !count($schedule_second)): ?>
									<span class="accordion-button__schedule-full">
										К сожалению, на ближайшую неделю запись к доктору полная.
										Пожалуйста, позвоните в колл-центр 8(8672)40-41-30,
										наши операторы подберут для Вас другое удобное время или включат в лист ожидания.
									</span>
								<?php endif; ?>

								<?php if(count($schedule_first)): ?>
									<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('schedule', ['title' => 'Запись в Клинику МЕГА на Доватора, 22','clinicId' => 1,'schedule' => $schedule_first,'doctor' => $selectedDoctor,'fromAppointment' => true])->html();
} elseif ($_instance->childHasBeenRendered('l3454337948-3')) {
    $componentId = $_instance->getRenderedChildComponentId('l3454337948-3');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3454337948-3');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3454337948-3');
} else {
    $response = \Livewire\Livewire::mount('schedule', ['title' => 'Запись в Клинику МЕГА на Доватора, 22','clinicId' => 1,'schedule' => $schedule_first,'doctor' => $selectedDoctor,'fromAppointment' => true]);
    $html = $response->html();
    $_instance->logRenderedChild('l3454337948-3', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?></livewire:schedule>
								<?php endif; ?>

								<?php if(count($schedule_second)): ?>
									<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('schedule', ['title' => 'Запись в Клинику МЕГА на Весенней, 7А','clinicId' => 4,'schedule' => $schedule_second,'doctor' => $selectedDoctor,'fromAppointment' => true])->html();
} elseif ($_instance->childHasBeenRendered('l3454337948-4')) {
    $componentId = $_instance->getRenderedChildComponentId('l3454337948-4');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3454337948-4');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3454337948-4');
} else {
    $response = \Livewire\Livewire::mount('schedule', ['title' => 'Запись в Клинику МЕГА на Весенней, 7А','clinicId' => 4,'schedule' => $schedule_second,'doctor' => $selectedDoctor,'fromAppointment' => true]);
    $html = $response->html();
    $_instance->logRenderedChild('l3454337948-4', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?></livewire:schedule>
								<?php endif; ?>
							 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
						 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
						<?php if(!$currentUser): ?>
						<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.accordion.item','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('accordion.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
							<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.accordion.button','data' => ['class' => ''.e($currentStep === 'registration' && !$this->currentUser ? 'selected' : 'collapsed', false).'

									accordion-button--heading','disabled' => 'disabled']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('accordion.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => ''.e($currentStep === 'registration' && !$this->currentUser ? 'selected' : 'collapsed', false).'

									accordion-button--heading','disabled' => 'disabled']); ?>
							<?php if($currentStep != 'registration' && !$this->currentUser): ?>
								<div class="accordion-button__step">Шаг 4</div>
							<?php endif; ?>
							<span class="accordion-button__text">Вход</span>
							 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

							<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.accordion.body','data' => ['id' => 'flush-collapseOne','class' => ''.e($currentStep === 'registration' && !$this->currentUser ? 'show' : '', false).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('accordion.body'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'flush-collapseOne','class' => ''.e($currentStep === 'registration' && !$this->currentUser ? 'show' : '', false).'']); ?>
								<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('auth.register', ['successEventName' => 'registerSuccess','userMustNotExists' => '0','showAuthForm' => '1','idNumber' => '2'])->html();
} elseif ($_instance->childHasBeenRendered('l3454337948-5')) {
    $componentId = $_instance->getRenderedChildComponentId('l3454337948-5');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3454337948-5');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3454337948-5');
} else {
    $response = \Livewire\Livewire::mount('auth.register', ['successEventName' => 'registerSuccess','userMustNotExists' => '0','showAuthForm' => '1','idNumber' => '2']);
    $html = $response->html();
    $_instance->logRenderedChild('l3454337948-5', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
							 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
						 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
						<?php endif; ?>
					</div>



					<div class="appointment-page__actions">
						<button wire:click="clearRecord" class="appointment-page__actions-btn mt-2 btn btn-dark btn-lg" data-bs-toggle="tooltip"
								data-bs-placement="top"
								title="При нажатии будут очищены выбранные поля формы">Очистить
						</button>

						<button
							wire:click="createEntry"
							class="appointment-page__actions-btn mt-2 btn btn-main btn-lg"
							<?php echo e(!$this->formComplete ? 'disabled="disabled"' : '', false); ?>

						>Записаться</button>
					</div>
				 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
			</div>
		</div>
	</div>
</div>

<?php /**PATH /var/www/resources/views/livewire/pages/appointment-page.blade.php ENDPATH**/ ?>