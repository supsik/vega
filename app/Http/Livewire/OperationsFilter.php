<?php

namespace App\Http\Livewire;
use App\Models\OperationBlock;

use Livewire\Component;

class OperationsFilter extends Component
{
    public string $search = '';
    public function render()
    {
        return view('livewire.operations-filter');
    }
    public function getOperationsBlocksProperty(){
        return OperationBlock::query()
        ->with(['operations' => function ($query) {
            $query->where('name', 'like', "%{$this->search}%");
        }
    ])->get();    
    }
}
