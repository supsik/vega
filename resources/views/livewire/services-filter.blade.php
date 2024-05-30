<div class="row section-top-space">
    <div class="col-12">
        <div class="filter tests-page__filter mb-5">
            <div class="filter__wrapper">
                <input
                    wire:model.debounce.500ms="search"
                    class="filter__input"
                    type="text"
                    placeholder="Поиск по услугам"
                >
            </div>
        </div>
    </div>

    <div class="col-12">
        @foreach ($this->services->doctors as $doctor)
            @if($doctor->services->isNotEmpty())
                <x-price-list.title>
                    {{ $doctor->full_name }}
                    <span class="">({{ $doctor->specialitiesList }})</span>
                </x-price-list.title>

                <x-price-list>
                    @foreach ($doctor->services as $service)
                        <x-price-list.item
                            :link="route('appointment.index', ['userId' => $doctor->id, 'serviceId' => $service->id]) "
                            :name="$service->title"
                            :price="$service->price"
                            :isDisabled="$service->is_disabled"
                        />
                    @endforeach
                </x-price-list>
            @endif
        @endforeach

        {{--        <x-price-list.title>--}}
        {{--            Хетагурова Яна Робертовна--}}
        {{--            <span class="">(Гастроинтеролог)</span>--}}
        {{--        </x-price-list.title>--}}

        {{--        <x-price-list>--}}
        {{--            @forelse ($this->services as $service)--}}
        {{--                <x-price-list.item--}}
        {{--                    :link="route('appointment.index', ['serviceId' => $service->id]) "--}}
        {{--                    :name="$service->title"--}}
        {{--                    :price="$service->price"></x-price-list.item>--}}

        {{--            @empty--}}
        {{--                <x-alert>Ничего не найдено</x-alert>--}}
        {{--            @endforelse--}}
        {{--        </x-price-list>--}}

    </div>
</div>
