<?php

namespace App\Http\Livewire;

use App\Models\Diagnostics;
use Illuminate\View\View;
use Livewire\Component;

class ServicesFilter extends Component
{
    public string $search = '';

    public $diagnosticsId;

    public function render(): View
    {
        return view('livewire.services-filter');
    }

    public function getServicesProperty()
    {
        return Diagnostics::query()
            ->with([
                'doctors' => function ($query) {
                    $query->oldest('second_name');
                },
                'doctors.services' => function ($query) {
                    $query->where('title', 'like', "%{$this->search}%");
                }
            ])
            ->findOrFail($this->diagnosticsId);
//        return Service::query()
//            ->where('diagnostics_id', $this->diagnosticsId)
//            ->where('title', 'like', "%{$this->search}%")
//            ->get();
    }
}
