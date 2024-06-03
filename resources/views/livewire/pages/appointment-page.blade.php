@section('title', 'Запись on-line - ' . config('app.name'))

<div class="appointment-page">
	<div class="container-fluid">
		<div class="appointment-page__inner">

			<x-breadcrumbs>
				<x-breadcrumbs.item isActive isDark isLarge>Запись on-line</x-breadcrumbs.item>
			</x-breadcrumbs>

			<div class="appointment-page__list section-top-space">

				<div class="appointment-page__select {{ $this->mode != '' ? 'hide' : '' }}">
					<h2 class="appointment-page__list-title">Начните запись на прием с выбора VegaДоктора или услуги</h2>

					<div class="appointment-page__select-action">
						<button
							class="appointment-page__select-btn _doctor-select"
							data-action="doctors"
							wire:click="setMode('doctors')"
						>
							Выбрать VegaДоктора
						</button>
						<button
							class="appointment-page__select-btn _service-select"
							data-action="services"
							wire:click="setMode('services')">
							Выбрать услугу
						</button>
					</div>
				</div>
				<x-accordion id="accordionFlushExample" class="main-accordion {{ $this->mode != '' ? 'show' : '' }}">
					<div class="appointment-page__accordion {{ $this->mode == 'services' ? 'show selected-tab' : '' }}">

						<x-accordion.item >
							<x-accordion.button
								class="
								{{ $currentStep !== 'step1' ? 'collapsed' : '' }}
								{{ $selectedService?->exists ? 'selected' : '' }} accordion-button--heading
								"
								wire:click="edit('step1')"
								wire:disabled="disabled"
							>
								<div class="accordion-button__select btn">
									{{ $selectedService?->exists ? 'Назад' : '' }}
								</div>
								<div class="accordion-button__step">Шаг 1</div>
								<span class="accordion-button__text">{{ $selectedService?->exists ? "Услуга: $selectedService->title" : 'Выбрать услугу' }}</span>
								<div class="accordion-button__select btn" style="{{ $selectedService?->exists ? 'display:none;' : '' }}">
									{{ $selectedService?->exists ? '' : 'Выбрать' }}
								</div>
							</x-accordion.button>

							<input class="{{ $currentStep === 'step1' ? 'show' : '' }} appointment-page__search-input search-form__input form-control" type="search" name="q" placeholder="Поиск по услугам..." required="" oninput="mega.searchServices(event)">

							<x-accordion.body
								id="flush-collapseOne"
								class="{{ $currentStep === 'step1' ? 'show' : '' }}"
							>
								<div class="accordion accordion-flush" id="accordionFlushService">
									@if(!empty($services) && !is_object($services))
									@foreach($services['categories'] as $key => $service)
									<div class="accordion-item" data-position="{{ $key + 1}}">
										<h2 class="accordion-header" id="flush-headingOne">
											<button class="accordion-button collapsed" type="button"
													data-bs-toggle="collapse"
													data-bs-target="#flush-collapse-{{$key}}"
													aria-expanded="false"
													aria-controls="flush-collapse-{{$key}}"
											>
												{{ $service['name'] }}
											</button>
										</h2>

										<div id="flush-collapse-{{$key}}"
										 class="accordion-collapse collapse"
										 aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushService">
											<div class="accordion-body">
												<section class="price-list">
													@foreach($service['diagnostics'] as $item)
														<div class="price-list__wrapper accordion-element">
															<div class="price-list__item">
																<span class="price-list__item-name accordion-element__name" itemprop="makesOffer" content ="{{ $item['title'] }}">
																	{{ $item['title'] }}
																</span>
																<span class="price-list__item-cost" itemprop="priceRange">
																	{{ price($item['price']) }}
																</span>

																@if($item['is_disabled'] && !$service['hide_phone'])
																	<div class="price-list__item-action">
																		<a href="tel:{{$variables->phone}}"class="price-list__item-disable" itemprop="telephone">{{ $variables->phone }}</a>
																	</div>
																@elseif(!$item['is_disabled'])
																	<div class="price-list__item-action">
																		<button wire:click="selectService({{ $item['id'] }})"
																				class="price-list__item-btn btn btn-main">Выбрать
																		</button>
																	</div>
																@endif
															</div>
														</div>
													@endforeach
												</section>
											</div>
										</div>
									</div>
									@endforeach
											<div class="accordion-body">
												<section class="price-list">
													@foreach($services['diagnostics'] as $item)
														<div class="price-list__wrapper accordion-element">
															<div class="price-list__item">
																<span class="price-list__item-name accordion-element__name" itemprop="makesOffer" content ="{{ $item['title'] }}">
																	{{ $item['title'] }}
																</span>
																<span class="price-list__item-cost" itemprop="priceRange">
																	{{ $item['price'] }}
																</span>

																<div class="price-list__item-action">
																@if($item['is_disabled'])
																	<a href="tel:{{$variables->phone}}"class="price-list__item-disable" itemprop="telephone" content ="{{ $variables->phone }}">
																		{{ $variables->phone }}
																	</a>
																@else
																	<button wire:click="selectService({{ $service['id'] }})"
																			class="price-list__item-btn btn btn-main">Выбрать
																	</button>
																@endif
																</div>
															</div>
														</div>
													@endforeach
												</section>
											</div>
										</div>
									@endif

								</div>
							</x-accordion.body>
						</x-accordion.item>

						<x-accordion.item>
							<x-accordion.button
								class="{{ $currentStep !== 'step2' ? 'collapsed' : '' }}
								{{ $selectedDoctor?->exists ? 'selected' : '' }}
								accordion-button--heading"
								wire:click="edit('step2')"
								wire:disabled="disabled"
							>
								<div class="accordion-button__select btn">
									{{ $selectedDoctor?->exists ? 'Назад' : '' }}
								</div>
								<div class="accordion-button__step">Шаг 2</div>
								<span class="accordion-button__text">{{ $selectedDoctor?->exists ? "VegaДоктор: $selectedDoctor->fullName" : 'Выбрать VegaДоктора' }}</span>

								<div class="accordion-button__select btn" style="{{ $selectedDoctor?->exists ? 'display:none;' : '' }}">
									{{ $selectedDoctor?->exists ? '' : 'Выбрать' }}
								</div>
							</x-accordion.button>

							<x-accordion.body
								id="flush-collapseOne"
								class="{{ $currentStep === 'step2' ? 'show' : '' }}"
							>
								<div class="appointment-page__doctors-list">
									@if(is_object($doctors))
									@foreach ($doctors as $doctor)
										<div class="appointment-doctor">
											<div class="appointment-doctor__info">
												<img
													class="appointment-doctor__photo img-fluid"
													src="{{ $doctor->getFirstMediaUrl('photo') }}"
													alt="{{ $doctor['second_name'] }} {{ $doctor['first_name'] }} {{ $doctor['last_name'] }}"
												>
												<span class="appointment-doctor__name">
												{{ $doctor['second_name'] }} {{ $doctor['first_name'] }} {{ $doctor['last_name'] }}
											</span>
											</div>

											<button wire:click="selectDoctor({{ $doctor['id'] }})"
													class="appointment-doctor__btn btn btn-main">Выбрать
											</button>
										</div>
									@endforeach
									@endif
								</div>

							</x-accordion.body>
						</x-accordion.item>


						<x-accordion.item>
							<x-accordion.button
								class="{{ $currentStep !== 'step3' ? 'collapsed' : '' }}
								{{ (!is_null($selectedTime) && !is_null($selectedDate)) ? 'selected' : '' }}
								accordion-button--heading"
								wire:click="edit('step3')"
								wire:loading.attr="disabled"
							>
								<div class="accordion-button__select btn">
									{{ (!is_null($selectedTime) && !is_null($selectedDate)) ? 'Назад' : '' }}
								</div>
								<div class="accordion-button__step">Шаг 3</div>
								<span class="accordion-button__text">{{ (!is_null($selectedTime) && !is_null($selectedDate)) ? 'Время: ' . __date($selectedDate) . ' ' .  $selectedTime : 'Выбрать свободное время' }}</span>
								<div class="accordion-button__select btn" style="{{ (!is_null($selectedTime) && !is_null($selectedDate)) ? 'display:none;' : '' }}">
									{{ (!is_null($selectedTime) && !is_null($selectedDate)) ? '' : 'Выбрать' }}
								</div>
							</x-accordion.button>

							<x-accordion.body
								id="flush-collapseOne"
								class="{{ $currentStep === 'step3' ? 'show' : '' }}"
							>
								@if(!count($schedule_first) && !count($schedule_second))
									<span class="accordion-button__schedule-full">
										К сожалению, на ближайшую неделю запись к доктору полная.
										Пожалуйста, позвоните в колл-центр 8(8672)40-41-30,
										наши операторы подберут для Вас другое удобное время или включат в лист ожидания.
									</span>
								@endif

								@if(count($schedule_first))
									<livewire:schedule
										title="Запись в Клинику Vega на Доватора, 22"
										:clinicId="1" :schedule="$schedule_first"
										:doctor="$selectedDoctor"
										:fromAppointment="true"></livewire:schedule>
								@endif

								@if(count($schedule_second))
									<livewire:schedule
										title="Запись в Клинику Vega на Весенней, 7А"
										:clinicId="4"
										:schedule="$schedule_second"
										:doctor="$selectedDoctor"
										:fromAppointment="true"></livewire:schedule>
								@endif
							</x-accordion.body>
						</x-accordion.item>
						@if(!$currentUser)
						<x-accordion.item>
							<x-accordion.button
								class="{{ $currentStep === 'registration' && !$this->currentUser ? 'selected' : 'collapsed' }}
									accordion-button--heading"
								disabled="disabled"
							>
							@if($currentStep != 'registration' && !$this->currentUser)
								<div class="accordion-button__step">Шаг 4</div>
							@endif
							<span class="accordion-button__text">Вход</span>
							</x-accordion.button>

							<x-accordion.body
								id="flush-collapseOne"
								class="{{ $currentStep === 'registration' && !$this->currentUser ? 'show' : '' }}"
							>
								<livewire:auth.register successEventName="registerSuccess" userMustNotExists="0" idNumber="1"/>
							</x-accordion.body>
						</x-accordion.item>
						@endif
					</div>

					<div class="appointment-page__accordion {{ $this->mode == 'doctors' ? 'show selected-tab' : '' }}">
						<x-accordion.item>
							<x-accordion.button
								class="
								{{ $currentStep !== 'step1' ? 'collapsed' : '' }}
								{{ $selectedDoctor?->exists ? 'selected' : '' }}
								accordion-button--heading"
								wire:click="edit('step1')"
								wire:loading.attr="disabled"

							>
								<div class="accordion-button__select btn">
									{{ $selectedDoctor?->exists ? 'Назад' : '' }}
								</div>
								<div class="accordion-button__step">Шаг 1</div>
								<span class="accordion-button__text">{{ $selectedDoctor?->exists ? "VegaДоктор: $selectedDoctor->fullName" : 'Выбрать VegaДоктора' }}</span>
								<div class="accordion-button__select btn" style="{{ $selectedDoctor?->exists ? 'display:none;' : '' }}">
									{{ $selectedDoctor?->exists ? '' : 'Выбрать' }}
								</div>
							</x-accordion.button>

							<input class="appointment-page__search-input search-form__input form-control {{ $currentStep === 'step1' ? 'show' : '' }}"
								type="search" name="q" placeholder="Поиск по докторам..." required="" oninput="mega.searchServices(event)">

							<x-accordion.body
								id="flush-collapseOne"
								class="{{ $currentStep === 'step1' ? 'show' : '' }}"
							>
								<div class="accordion accordion-flush" id="accordionFlushCategory">
									@if(!empty($doctors) && !is_object($doctors))
										@foreach($doctors as $key => $doctor)
										<div class="accordion-item" data-position="{{ $key }}">
											<h2 class="accordion-header" id="flush-headingOne">
												<button class="accordion-button collapsed" type="button"
														data-bs-toggle="collapse"
														data-bs-target="#flush-collapse-{{ $key }}"
														aria-expanded="false"
														aria-controls="flush-collapse-{{ $key }}"
												>
													{{ $doctor['plural_name'] }}
												</button>
											</h2>

											<div id="flush-collapse-{{ $key }}"
												 class="accordion-collapse collapse"
												 aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushCategory">
												<div class="accordion-body">
													<div class="appointment-page__doctors-list">
														@foreach ($doctor['doctors'] as $person)
														<div class="appointment-doctor accordion-element">
															<div class="appointment-doctor__info">
																<img
																	class="appointment-doctor__photo img-fluid"
																	src="{{ $person['avatar'] }}"
																	alt="{{$person['second_name']}} {{ $person['first_name'] }} {{$person['last_name']}}"
																>
																<span class="appointment-doctor__name accordion-element__name">
																{{$person['second_name']}} {{ $person['first_name'] }} {{$person['last_name']}}
																</span>
															</div>

															<button wire:click="selectDoctor({{ $person['id'] }})"
																	class="appointment-doctor__btn btn btn-main">Выбрать
															</button>
														</div>
														@endforeach
													</div>
												</div>
											</div>
										</div>
										@endforeach
									@endif
								</div>
							</x-accordion.body>
						</x-accordion.item>

						<x-accordion.item>
							<x-accordion.button
								class="
								{{ $currentStep !== 'step2' ? 'collapsed' : '' }}
								{{ $selectedService?->exists ? 'selected' : '' }}
								accordion-button--heading"
								wire:click="edit('step2')"
								wire:loading.attr="disabled"
							>
								<div class="accordion-button__select btn">
									{{ $selectedService?->exists ? 'Назад' : '' }}
								</div>
								<div class="accordion-button__step">Шаг 2</div>
								<span class="accordion-button__text">{{ $selectedService?->exists ? "Услуга: $selectedService->title" : 'Выбрать услугу' }}</span>
								<div class="accordion-button__select btn" style="{{ $selectedService?->exists ? 'display:none;' : '' }}">
									{{ $selectedService?->exists ? '' : 'Выбрать' }}
								</div>
							</x-accordion.button>
							<x-accordion.body
								id="flush-collapseOne"
								class="{{ $currentStep === 'step2' ? 'show' : '' }}"
							>
								<section class="price-list">
									@if (is_object($services))
									@foreach($services as $service)
										<div class="price-list__wrapper">
											<div class="price-list__item">
												<span class="price-list__item-name">
													{{ $service['title'] }}
												</span>
												<span class="price-list__item-cost">
													{{ price($service['price']) }}
												</span>

												<div class="price-list__item-action">
												@if($service['is_disabled'])
													<a href="tel:{{$variables->phone}}"class="price-list__item-disable" itemprop="telephone" content ="8 (8672) 40-41-30">{{ $variables->phone }}</a>
												@else
													<button wire:click="selectService({{ $service['id'] }})"
															class="price-list__item-btn btn btn-main">Выбрать
													</button>
												@endif
												</div>
											</div>
										</div>
									@endforeach
									@endif
								</section>
							</x-accordion.body>
						</x-accordion.item>

						<x-accordion.item>
							<x-accordion.button
								class="{{ $currentStep !== 'step3' ? 'collapsed' : '' }}
								{{ (!is_null($selectedTime) && !is_null($selectedDate)) ? 'selected' : '' }}
								accordion-button--heading"
								wire:click="edit('step3')"
								wire:loading.attr="disabled"
							>
								<div class="accordion-button__select btn">
									{{ (!is_null($selectedTime) && !is_null($selectedDate)) ? 'Назад' : '' }}
								</div>
								<div class="accordion-button__step">Шаг 3</div>
								<span class="accordion-button__text">
									{{ (!is_null($selectedTime) && !is_null($selectedDate)) ? 'Время: ' . __date($selectedDate) . ' ' .  $selectedTime : 'Выбрать свободное время' }}
								</span>
								<div class="accordion-button__select btn" style="{{(!is_null($selectedTime) && !is_null($selectedDate)) ? 'display:none;' : '' }}">
									{{ (!is_null($selectedTime) && !is_null($selectedDate)) ? '' : 'Выбрать' }}
								</div>
							</x-accordion.button>

							<x-accordion.body
								id="flush-collapseOne"
								class="{{ $currentStep === 'step3' ? 'show' : '' }}"
							>
								@if(!count($schedule_first) && !count($schedule_second))
									<span class="accordion-button__schedule-full">
										К сожалению, на ближайшую неделю запись к доктору полная.
										Пожалуйста, позвоните в колл-центр 8(8672)40-41-30,
										наши операторы подберут для Вас другое удобное время или включат в лист ожидания.
									</span>
								@endif

								@if(count($schedule_first))
									<livewire:schedule
										title="Запись в Клинику Vega на Доватора, 22"
										:clinicId="1" :schedule="$schedule_first"
										:doctor="$selectedDoctor"
										:fromAppointment="true"></livewire:schedule>
								@endif

								@if(count($schedule_second))
									<livewire:schedule
										title="Запись в Клинику Vega на Весенней, 7А"
										:clinicId="4"
										:schedule="$schedule_second"
										:doctor="$selectedDoctor"
										:fromAppointment="true"></livewire:schedule>
								@endif
							</x-accordion.body>
						</x-accordion.item>
						@if(!$currentUser)
						<x-accordion.item>
							<x-accordion.button
								class="{{ $currentStep === 'registration' && !$this->currentUser ? 'selected' : 'collapsed' }}
									accordion-button--heading"
								disabled="disabled"
							>
							@if($currentStep != 'registration' && !$this->currentUser)
								<div class="accordion-button__step">Шаг 4</div>
							@endif
							<span class="accordion-button__text">Вход</span>
							</x-accordion.button>

							<x-accordion.body
								id="flush-collapseOne"
								class="{{ $currentStep === 'registration' && !$this->currentUser ? 'show' : '' }}"
							>
								<livewire:auth.register successEventName="registerSuccess" userMustNotExists="0" showAuthForm="1" idNumber="2"/>
							</x-accordion.body>
						</x-accordion.item>
						@endif
					</div>



					<div class="appointment-page__actions">
						<button wire:click="clearRecord" class="appointment-page__actions-btn mt-2 btn btn-dark btn-lg" data-bs-toggle="tooltip"
								data-bs-placement="top"
								title="При нажатии будут очищены выбранные поля формы">Очистить
						</button>

						<button
							wire:click="createEntry"
							class="appointment-page__actions-btn mt-2 btn btn-main btn-lg"
							{{ !$this->formComplete ? 'disabled="disabled"' : '' }}
						>Записаться</button>
					</div>
				</x-accordion>
			</div>
		</div>
	</div>
</div>

