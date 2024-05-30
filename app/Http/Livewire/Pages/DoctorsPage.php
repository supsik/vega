<?php

namespace App\Http\Livewire\Pages;

use App\Models\Speciality;
use Livewire\Component;

class DoctorsPage extends Component
{
    public $search;
    public $specialityId;
    public $specialitiesList;

    protected $listeners = [
        'diagnosticsSelectChange',
    ];

    public function diagnosticsSelectChange(int|string $specialityId)
    {
        $this->specialityId = $specialityId;
    }

    public function mount()
    {
        $this->specialitiesList = Speciality::query()
            ->select(['plural_name', 'id'])
            ->whereHas('doctors')
            ->get();
    }


    public function render()
    {
        $specialities = Speciality::query()
            ->oldest('plural_name')
            ->with([
                'doctors' => function ($query) {
                    $query
                        ->whereRaw(
                            "CONCAT(`second_name`, ' ', `first_name`, ' ', `last_name`) LIKE ?",
                            ["%{$this->search}%"]
                        )
                        ->oldest('second_name');
                },
                'doctors.media'
            ])
            ->whereHas('doctors', function ($query) {
                $query->whereRaw(
                    "CONCAT(`second_name`, ' ', `first_name`, ' ', `last_name`) LIKE ?",
                    ["%{$this->search}%"]
                );
            })
            ->when($this->specialityId, function ($query) {
                $query->whereIn('id', [$this->specialityId]);
            })
            ->get();

        return view('livewire.pages.doctors-page', compact('specialities'))
            ->extends('layouts.main')
            ->slot('content');
    }
}
