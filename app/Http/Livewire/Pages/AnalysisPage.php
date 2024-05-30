<?php

namespace App\Http\Livewire\Pages;

use App\Models\Analysis;
use App\Models\AnalysisGroup;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Livewire\Component;

class AnalysisPage extends Component
{
    public string $search = '';

    public $selectedIds;

    public $limit = 1;

    protected $listeners = [
        'addAnalysis' => 'add',
        'removeAnalysis' => 'remove',
    ];

    public function mount(): void
    {
        $this->selectedIds = session('selectedAnalysis', []);
    }

    public function render(): View
    {
        return view('livewire.pages.analysis-page')
            ->extends('layouts.main')
            ->slot('content');
    }

    public function updatedSearch(): void
    {
        $this->limit = 1;
    }

    public function getLoadMoreVisibleProperty(): bool
    {
        return AnalysisGroup::count() > $this->limit && $this->search === '';
    }

    public function getAnalysisGroupsProperty(): Collection
    {
        return AnalysisGroup::query()
            ->with([
                'analysis' => function ($query) {
                    $query->where('name', 'like', "%{$this->search}%");
                }
            ])
            ->whereHas('analysis', function ($query) {
                $query->where('name', 'like', "%{$this->search}%");
            })
            ->when($this->search === '', function ($query) {
                $query->take($this->limit);
            })
            ->get();
    }

    public function getSelectedAnalysisProperty(): Collection
    {
        return $this->selectedItems = Analysis::query()
            ->whereIn('id', $this->selectedIds)
            ->get();
    }

    public function getTotalPriceProperty(): int
    {
        return $this->selectedAnalysis->sum('price');
    }

    public function add(int $id): void
    {
        $key = array_search($id, $this->selectedIds);

        if ($key === false) {
            $this->selectedIds[] = $id;

            session(['selectedAnalysis' => $this->selectedIds]);

            $this->emit("changeListItem.{$id}", true);
        }
    }

    public function remove(int $id): void
    {
        $key = array_search($id, $this->selectedIds);
        if ($key !== false) {
            unset($this->selectedIds[$key]);

            session(['selectedAnalysis' => $this->selectedIds]);

            $this->emit("changeListItem.{$id}", false);
        }
    }

    public function loadMore(): void
    {
        $this->limit += 1;
    }
}
