@extends('layouts.main')

@section('title', 'Прайс - ' . config('app.name'))

@section('content')
	<div class="prices-page">
		<div class="container-fluid">
			<div class="prices-page__inner">

				<x-breadcrumbs>
					<x-breadcrumbs.item isActive isLarge>Прайс</x-breadcrumbs.item>
				</x-breadcrumbs>


				<div class="prices-page__list section-top-space">
					<div class="accordion accordion-flush" id="accordionFlushExample">

						@foreach($diagnostics as $diagnosticsItem)
							@if(count($diagnosticsItem['services']))

								<div class="accordion-item">
									<h2 class="accordion-header" id="flush-headingOne">
										<button class="accordion-button collapsed" type="button"
												data-bs-toggle="collapse"
												data-bs-target="#flush-collapse-{{ $diagnosticsItem['id'] }}"
												aria-expanded="false"
												aria-controls="flush-collapse-{{ $diagnosticsItem['id'] }}">
											{{ $diagnosticsItem['name'] }}
										</button>
									</h2>

									<div id="flush-collapse-{{ $diagnosticsItem['id'] }}"
										 class="accordion-collapse collapse"
										 aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
										<div class="accordion-body">

											<x-price-list>
												@foreach ($diagnosticsItem['services'] as $service)
													<x-price-list.item
														:link="route('appointment.index', ['serviceId' => $service['id']])"
														:name="$service['title']"
														:href="$service['link']"
														:price="$service['price']"
														:isDisabled="$service['is_disabled']"
													></x-price-list.item>
												@endforeach
											</x-price-list>

										</div>
									</div>

								</div>

							@endif
						@endforeach

						<div class="accordion-item">
							<h2 class="accordion-header" id="flush-headingOne">
								<button class="accordion-button collapsed" type="button"
										data-bs-toggle="collapse"
										data-bs-target="#flush-collapse-999"
										aria-expanded="false"
										aria-controls="flush-collapse-999">
									Анализы
								</button>
							</h2>

							<div id="flush-collapse-999"
									class="accordion-collapse collapse"
									aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
								<div class="accordion-body">
								<input class="show appointment-page__search-input search-form__input form-control" type="search" name="q" placeholder="Поиск по анализам..." required="" oninput="mega.searchAnalys(event)">
								@foreach($analysis as $analys)
									@if($analys->analysis->count())

										<div class="accordion-item" id="sub-accordionExample">
											<h2 class="accordion-header" id="sub-headingOne">
												<button class="accordion-button collapsed" type="button"
														data-bs-toggle="collapse"
														data-bs-target="#sub-collapseOne-{{ $analys->id }}"
														aria-expanded="true"
														aria-controls="collapseOne">
													{{ $analys->name }}
												</button>
											</h2>

											<div id="sub-collapseOne-{{ $analys->id }}"
												class="accordion-collapse collapse"
												aria-labelledby="flush-headingOne" data-bs-parent="#sub-accordionExample">
												<div class="accordion-body">

													<x-price-list>
														@foreach ($analys->analysis as $service)
															<x-price-list.item
																link=""
																:name="$service->name"
																href=""
																:price="$service->price"
																:isDisabled="$service->is_disabled"
															></x-price-list.item>
														@endforeach
													</x-price-list>

												</div>
											</div>

										</div>

									@endif
								@endforeach
								</div>
							</div>

						</div>

					</div>


				</div>
			</div>
		</div>
	</div>
@endsection
