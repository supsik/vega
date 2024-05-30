<?php

namespace App\Http\Controllers;

use App\Actions\TransformScheduleToHumanFormat;
use App\Medods\Medods;
use App\Models\Doctor;
use App\Models\Speciality;
use Illuminate\Support\Carbon;
use Illuminate\View\View;

class DoctorsController extends Controller
{

    public function speciality($slug)
    {
        $speciality = Speciality::query()
            ->where('slug', $slug)
            ->with('doctors')
            ->first();

        if(!$speciality)
        {
            $speciality = Speciality::query()
                ->where('id', $slug)
                ->first(['slug']);

            if($speciality)
                return redirect()->route('doctors.speciality', $speciality->slug);
        }

       return view('doctors.speciality', compact('speciality'));
    }

    public function show(Doctor $doctor, Medods $medods): View
    {
        if ($doctor->medods()->exists()) {
            $startDate = Carbon::now()->format('Y-m-d');
            $endDate = Carbon::now()->addDays(7)->format('Y-m-d');

            $firstPoints = $medods->schedule()->points([
                "startDate" => $startDate,
                "endDate" => $endDate,
                "clinicId" => 1,
                "allowAppointmentIntersection" => false,
                "userParams" => [
                    $doctor->medods->id => [
                        'step' => 30
                    ]
                ]
            ]);

            $secondPoints = $medods->schedule()->points([
                "startDate" => $startDate,
                "endDate" => $endDate,
                "clinicId" => 4,
                "allowAppointmentIntersection" => false,
                "userParams" => [
                    $doctor->medods->id => [
                        'step' => 30
                    ]
                ]
            ]);
            // echo '<pre>' . htmlentities(print_r([['id' => $doctor->medods->id, 'schedule' => $firstPoints], ['id' => $doctor->medods->id, 'schedule' => $secondPoints]], true)) . '</pre>';
        }

        $firstSchedule = (new TransformScheduleToHumanFormat())->run($firstPoints ?? []);
        $secondSchedule = (new TransformScheduleToHumanFormat())->run($secondPoints ?? []);

        return view('doctors.show', compact('doctor', 'firstSchedule', 'secondSchedule'));
    }
}
