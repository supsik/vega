@section('title', 'VegaДоктора - ' . config('app.name'))

<div class="doctors-page">
    <div class="container-fluid">
        <div class="doctors-page__inner">

            <x-breadcrumbs>
                <x-breadcrumbs.item isActive>VegaДоктора</x-breadcrumbs.item>
            </x-breadcrumbs>

            <div class="filter doctors-page__filter">
                <div class="filter__wrapper">
                    <input
                        wire:model.debounce.500ms="search"
                        class="filter__input mb-3"
                        type="text"
                        placeholder="Поиск по имени"
                    >

                    <div
                        wire:ignore
                        class="diagnostics-select"
                    >
                        <select id="diagnostics-select2" class="js-states form-control">
                            <option selected value="">Все специальности</option>
                            @foreach($specialitiesList as $speciality)
                                <option value="{{ $speciality->id }}">{{ $speciality->plural_name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </div>

            <div class="doctors-page__list">
                @foreach($specialities as $speciality)
                    <section id="{{$speciality->id}}" class="doctors-section {{ $loop->first ? 'section-top-space' : ''}}">
                        <h3 class="doctors-section__title section-title">
                            <a href="{{ route('doctors.speciality', $speciality) }}" >{{ $speciality->plural_name }}</a>
                        </h3>

                        <div class="doctors-section__list">

                            @foreach($speciality->doctors as $doctor)
                                <a class="person person--link doctors__person"  href="{{ route('doctors.show', $doctor->slug) }}">
                                    <img
                                        class="person__photo img-fluid"
                                        src="{{ $doctor->getFirstMediaUrl('photo') }}"
                                        alt="{{ $doctor->full_name }}"
                                    >
                                    <div class="person__info">
                                        <h4 class="person__name" itemprop = "employee" >
                                            {{ $doctor->full_name }}
                                        </h4>
                                        <span class="person__position" itemprop = "medicalSpecialty">
                                            {{ $doctor->specialitiesList }}
                                        </span>
                                    </div>
                                </a>
                            @endforeach

                        </div>
                    </section>
                @endforeach

            </div>


        </div>
    </div>
</div>
