<?php

namespace App\Http\Livewire\Pages;

use App\Actions\TransformScheduleToHumanFormat;
use App\Medods\Exceptions\MedodsException;
use App\Models\Doctor;
use App\Models\Service;
use App\Models\Diagnostics;
use Illuminate\Support\Carbon;
use Illuminate\View\View;
use Livewire\Component;
use Illuminate\Support\Facades\Cache;

class AppointmentPage extends Component
{
    public $mode = '';

    public $currentStep = 'step1';
    public $notCurrentStep = false;

    public $selectedClinic = null;

    public $selectedService = null;

    public $selectedDoctor = null;

    public $selectedTime = null;
    public $selectedDate = null;

    public $services = [];

    public $doctors = [];

    public $schedule_first = [];
    public $schedule_second = [];

    public $currentUser = null;

    public $register = null;

    public $formComplete = false;

    protected $listeners = [
        'dateTimeSelected' => 'selectDateTime',
        'registerSuccess',
    ];

    public function mount(): void
    {
        if(!empty(request()->all()))
        {
            if(!empty(request()->userId))
            {
                $this->setMode('doctors');
                $this->selectDoctor(request()->userId);
            }

            if(!empty(request()->date) && !empty(request()->time) && !empty(request()->clinicId))
            {
                $this->selectDateTime(request()->date, request()->time, request()->clinicId);
                $this->currentStep = 'step2';
            }

            if(!empty(request()->serviceId))
            {
                $this->setMode('services');
                $this->selectService(request()->serviceId);
            }

            $this->notCurrentStep = true;
        }

        $this->currentUser = request()->user() ?? false;
    }

    public function render(): View
    {
        return view('livewire.pages.appointment-page')
            ->extends('layouts.main')
            ->slot('content');
    }

    public function selectDoctor(int $doctorId): void
    {
        $this->selectedDoctor = Doctor::query()
                ->with('services', 'medods')
                ->where('id', $doctorId)
                ->first();

        if ($this->mode == 'services' )
        {
            $this->currentStep = 'step3';
            $this->loadSchedule($this->selectedDoctor->medods_id);
        }
        elseif ($this->mode == 'doctors')
        {
            $this->currentStep = 'step2';
            $this->getService($doctorId);
        }
    }

    public function selectService(int $serviceId)
    {
        $this->selectedService = Service::query()
            ->with('doctors')
            ->where('id', $serviceId)
            ->first();

        if ($this->mode == 'services')
        {
            $this->currentStep = 'step2';
            $this->getDoctors($serviceId);
        }
        elseif($this->mode == 'doctors')
        {
            if($this->notCurrentStep == true)
            {
                if(auth()->check())
                {
                    $this->formComplete = true;
                    $this->currentStep="finish";
                }else
                    $this->currentStep = 'registration';
            }else
                $this->currentStep = 'step3';

            $this->loadSchedule($this->selectedService['doctors'][0]['medods_id']);
        }
    }

    public function selectDateTime(string $date, string $time, int $clinicId): void
    {
        $this->selectedClinic = $clinicId;

        $this->selectedDate = $date;
        $this->selectedTime = $time;

        if(!$this->currentUser)
            $this->currentStep = 'registration';
        else
        {
            $this->formComplete = true;
            $this->currentStep = 'finish';
        }

    }

    public function createEntry()
    {
        try {
            $entryType = app('medods')->entryType()->find($this->selectedService->id);

            $params = [
                'clinicId' => (int)$this->selectedClinic,
                'clientId' => $this->currentUser->medodsId,
                'userId' => $this->selectedDoctor->medods->id,
                'date' => $this->selectedDate,
                'time' => $this->selectedTime,
                'duration' => $entryType['duration'] ?? config('medods.duration'),
                'appointmentTypeId' => 1, // Первичный прием
                'appointmentSourceId' => config('medods.source_id'),
                'entryTypeIds' => [$entryType['id']],
            ];

            app('medods')->appointment()->create($params);

            $scheduleCacheKey = "schedule_{$this->selectedDoctor->id}_{$params['clinicId']}";
            $apponimentsCacheKey = "user_apponments_{$params['clientId']}";

            Cache::store('file')->forget($scheduleCacheKey);
            Cache::store('file')->forget($apponimentsCacheKey);

            $this->reset();

            flash()->success('Запись на услугу успешно зарегистрирована!');

            $this->dispatchBrowserEvent('formSubmitted');

            return redirect()->route('user.appointment.index');
        } catch (MedodsException $e) {
            $this->emit('flash', 'danger', 'Ошибка записи на прием. Повторите попытку позже!');
        }
    }

    public function getService(int $doctorId)
    {
        $this->services = Service::query()
            ->with('diagnostics')
            // ->whereHas('diagnostics')
            ->with('doctors')
            ->whereHas('doctors', function($query)use($doctorId){
                    $query->where('doctors.id', $doctorId);
            })
            ->get();
    }

    private function loadServices()
    {
        $services = Service::query()
            ->select('services.*', 'doctors.second_name as doctor_second_name')
            ->join('doctor_service', 'services.id', '=', 'doctor_service.service_id')
            ->join('doctors', 'doctors.id', '=', 'doctor_service.doctor_id')
            ->whereHas('diagnostics')
            ->with('diagnostics')
            ->whereHas('doctors')
            ->get();

        $diagnostics_not_category = [];
        $services_type = ['categories'=>[]];
        foreach ($services as $service)
        {
            if ($service['diagnostics'] == [])
            {
                $diagnostics_not_category[$service['id']] = [
                    'id' => $service['id'],
                    'title' => $service['title'],
                    'price' => $service['price'],
                    'is_disabled' =>  $service['is_disabled'],
                ];
                continue;
            }

            if (!array_key_exists($service['diagnostics']['id'], $services_type['categories']))
            {
                $services_type['categories'][$service['diagnostics']['id']] = [
                        'id' => $service['diagnostics']['id'],
                        'name' => $service['diagnostics']['name'],
                        'hide_phone' => $service['diagnostics']['hide_phone'],
                    ];
            }

            $services_type['categories'][$service['diagnostics']['id']]['diagnostics'][] = [
                    'id' => $service['id'],
                    'title' => $service['title'],
                    'price' => $service['price'],
                    'is_disabled' =>  $service['is_disabled'],
                    'diagnostic_id' => $service['diagnostics_id'],
                    'doctor_second_name' => $service['doctor_second_name'],
                ];

            usort(
                $services_type['categories'][$service['diagnostics']['id']]['diagnostics'],
                function($a, $b)
                {
                    return strcmp($a["doctor_second_name"], $b["doctor_second_name"]);
                }
            );
        }

        $services_type['categories'] = array_values($services_type['categories']);
        $services_type['diagnostics'] = $diagnostics_not_category;
        $this->services = $services_type;
    }

    private function getDoctors(int $serviceId)
    {
        $this->doctors = Doctor::query()
                ->with('media', 'medods', 'specialities', 'services')
                ->whereHas('medods')
                ->whereHas('services', function($query)use($serviceId){
                    $query->where('services.id', $serviceId);
                })
                ->oldest('second_name')
                ->get();
    }

    private function loadDoctors()
    {
        $doctors = Doctor::query()
                ->with('media', 'medods', 'specialities')
                ->whereHas('medods')
                ->select(['id', 'slug', 'first_name', 'second_name', 'last_name', 'specialities_json', 'medods_id'])
                ->oldest('second_name')
                ->get();

        $specialities = [];
        foreach ($doctors as $doctor)
        {
            foreach ($doctor['specialities'] as $speciality)
            {
                if (!array_key_exists($speciality['id'], $specialities))
                {
                    $specialities[$speciality['id']] = [
                            'id' => $speciality['id'],
                            'plural_name' => $speciality['plural_name'],
                        ];
                }

                 $specialities[$speciality['id']]['doctors'][] = [
                            'id' => $doctor['id'],
                            'first_name' => $doctor['first_name'],
                            'second_name' => $doctor['second_name'],
                            'last_name' => $doctor['last_name'],
                            'avatar' => $doctor->getFirstMediaUrl('photo'),
                    ];

            }
        }
        $this->doctors = $specialities;

    }

    private function loadSchedule(int|null $medodsDoctorId): void
    {
        try {
            $this->schedule_first = $this->fetchSchedule(1, $medodsDoctorId);
            $this->schedule_second = $this->fetchSchedule(4, $medodsDoctorId);

        } catch (MedodsException) {
            $this->emit('flash', 'danger', 'Произошла ошибка при загрузке расписания.');
        }
    }

    private function fetchSchedule($clinicId, $doctorId): array
    {
        $startDate = Carbon::now()->format('Y-m-d');
        $endDate = Carbon::now()->addDays(7)->format('Y-m-d');

        $points = app('medods')->schedule()->points([
            "startDate" => $startDate,
            "endDate" => $endDate,
            "clinicId" => $clinicId,
            "allowAppointmentIntersection" => false,
            "userParams" => [
                $doctorId => [
                    'step' => 30
                ]
            ]
        ]);
        return (new TransformScheduleToHumanFormat())->run($points);
    }

    private function getMode(): string
    {
        if (request()->has('serviceId') && !request()->has('userId') && !request()->has('time') && !request()->has('date')) {
            return 'service';
        }

        if (request()->has('userId') && request()->has('time') && request()->has('date')) {
            return 'doctor';
        }

        if (request()->has('userId') && request()->has('serviceId') && !request()->has('time') && !request()->has('date')) {
            return 'diagnostics';
        }

        return 'base';
    }

    private function isServiceMode(): bool
    {
        return $this->mode === 'service';
    }

    private function isDoctorMode(): bool
    {
        return $this->mode === 'doctor';
    }

    private function isDiagnosticsMode(): bool
    {
        return $this->mode === 'diagnostics';
    }

    private function isBaseMode(): bool
    {
        return $this->mode === 'base';
    }

    public function resetForm(): void
    {
        $this->reset();

        $this->mount();
    }

    public function setMode($mode)
    {
        $method = 'load'.ucfirst($mode);
        $this->$method();
        $this->mode = $mode;
    }

    public function setCurrentStep($currentStep)
    {
        $this->currentStep = $currentStep;
    }

    public function edit($currentStep)
    {
        if ($this->currentStep === $currentStep)
        {
            $this->currentStep = null;
            return false;
        }
        $this->currentStep = $currentStep;
        return true;
    }

    public  function clearRecord ()
    {
        $this->formComplete = false;
        $this->selectedService = null;
        $this->selectedDoctor = null;
        $this->selectedTime = null;
        $this->selectedDate = null;
        $this->currentStep = 'step1';
    }

    public function registerSuccess(array $params)
    {
        $this->formComplete = true;
        $this->currentStep = 'finish';
        $this->register = true;
        $this->currentUser = request()->user();
    }
}
