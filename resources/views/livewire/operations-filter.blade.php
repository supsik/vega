<div class="row section-top-space">
    <div class="col-12">
        <div class="filter tests-page__filter mb-5">
            <div class="filter__wrapper">
                <input
                    wire:model.debounce.live="search"
                    class="filter__input"
                    type="text"
                    placeholder="Поиск по операциям"
                >
            </div>
        </div>
    </div>
    <div class="col-12">
        @foreach ($this->operationsBlocks as $operationBlock)
        @if ($operationBlock->operations->count())
                <x-price-list.title>
                    {{ $operationBlock->name }}
                </x-price-list.title>

                <x-price-list>
                    @foreach ($operationBlock->operations as $operation)
                        <x-price-list.item
                            :name="$operation->name"
                            :price="$operation->price"
                            {{-- :link="route('operations.show',$operation->slug)" --}}
                        />
                    @endforeach
                </x-price-list>
        @endif
        @endforeach
    </div>
</div>
