<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Flash extends Component
{
    protected $listeners = [
        'flash',
    ];

    public function render()
    {
        return view('livewire.flash');
    }

    public function flash($type, $message)
    {
        flash()->{$type}($message);
    }

}
