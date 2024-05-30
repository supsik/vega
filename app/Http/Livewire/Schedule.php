<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Schedule extends Component
{
    public bool $fromAppointment = false;

    public $title = null;

    public $clinicId;

    public $doctor;

    public $schedule;

    public $currentDayId = 0;


    public function render()
    {
        return view('livewire.schedule');
    }

    public function setDayId($dayId): void
    {
        $this->currentDayId = $dayId;
    }

    public function getCurrentScheduleProperty()
    {
        return $this->schedule[$this->currentDayId];
    }
}
