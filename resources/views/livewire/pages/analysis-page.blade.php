@section('title', 'Анализы - ' . config('app.name'))

<div class="tests-page">
    <div class="container-fluid">
        <div class="tests-page__inner">

            <x-breadcrumbs>
                <x-breadcrumbs.item isActive>Анализы</x-breadcrumbs.item>
            </x-breadcrumbs>


            <div class="filter tests-page__filter">
                <div class="filter__wrapper">
                    <input
                        wire:model.debounce.500ms="search"
                        class="filter__input"
                        type="text"
                        placeholder="Поиск по анализам"
                    >
                </div>
            </div>

            <div class="tests-page__calc">
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <div class="calc-result">
                            <h5 class="calc-result__sum">
                                Вы выбрали анализы на сумму: <span>{{ price($this->totalPrice) }}</span>
                            </h5>
                            <div class="calc-result__list">

                                @foreach($this->selectedAnalysis as $analysis)
                                    <livewire:analysis.selected-item :analysis="$analysis"
                                                                     :key="'calc_' . $analysis->id"/>
                                @endforeach

                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-8">

                        @if($this->analysisGroups->count() > 0)
                            @foreach($this->analysisGroups as $group)
                                <section class="price-list">
                                    <h4 class="price-list__title">{{ $group->name }}</h4>

                                    <div class="price-list__wrapper">

                                        @foreach($group->analysis as $analysis)
                                            <livewire:analysis.list-item
                                                :analysis="$analysis"
                                                :key="'list_' . $analysis->id"
                                            />
                                        @endforeach
                                    </div>
                                </section>
                            @endforeach

                            @if($this->loadMoreVisible)
                                <button wire:click="loadMore" class="btn btn-main btn-lg">Показать еще</button>
                            @endif
                        @else
                            <x-alert>Ничего не найдено</x-alert>
                        @endif

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

