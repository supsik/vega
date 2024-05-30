<?php

namespace App\Http\Livewire\Analysis;

use App\Models\Analysis;
use Illuminate\View\View;
use Livewire\Component;

class SelectedItem extends Component
{
    public $analysis;

    public function mount(Analysis $analysis): void
    {
        $this->analysis = $analysis;
    }

    public function render(): View
    {
        return view('livewire.analysis.selected-item');
    }

    public function remove(int $id): void
    {
        $this->emitUp('removeAnalysis', $id);
    }
}
