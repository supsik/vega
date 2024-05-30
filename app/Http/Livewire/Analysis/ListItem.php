<?php

namespace App\Http\Livewire\Analysis;

use App\Models\Analysis;
use Illuminate\View\View;
use Livewire\Component;

class ListItem extends Component
{
    public $analysis;

    public $selected;

    protected function getListeners(): array
    {
        return [
            "changeListItem.{$this->analysis->id}" => 'changeSelectedState'
        ];
    }

    public function mount(Analysis $analysis): void
    {
        $this->analysis = $analysis;

        $this->selected = in_array($analysis->id, session('selectedAnalysis', []));
    }

    public function render(): View
    {
        return view('livewire.analysis.list-item');
    }

    public function changeSelectedState($value): void
    {
        $this->selected = $value;
    }

    public function add(int $id): void
    {
        $this->emitUp('addAnalysis', $id);
    }

    public function remove(int $id): void
    {
        $this->emitUp('removeAnalysis', $id);
    }
}
