<?php

namespace App\Http\Controllers;

use App\Models\Diagnostics;
use Illuminate\View\View;
use App\Models\Analysis;
use App\Models\Service;
use App\Models\AnalysisGroup;

class PricesController extends Controller
{
    public function __invoke(): View
    {
        $services = Service::query()
            ->select('services.*', 'doctors.second_name as doctor_second_name')
            ->join('doctor_service', 'services.id', '=', 'doctor_service.service_id')
            ->join('doctors', 'doctors.id', '=', 'doctor_service.doctor_id')
            ->whereHas('diagnostics')
            ->with('diagnostics')
            ->whereHas('doctors')
            ->get()
            ->toArray();

        $diagnostics = [];

        foreach($services as $service)
        {
            $categoryId = $service['diagnostics']['id'];
            if (!array_key_exists($categoryId, $diagnostics))
            {
                $diagnostics[$categoryId] = $service['diagnostics'];
            }

            unset($service['diagnostics']);

            $diagnostics[$categoryId]['services'][] = $service;

            usort(
                $diagnostics[$categoryId]['services'],
                function($a, $b)
                {
                    return strcmp($a["doctor_second_name"], $b["doctor_second_name"]);
                }
            );
        }

        $analysis = AnalysisGroup::query()
            ->with([
                'analysis'
            ])
            ->get();

        return view('prices', compact('diagnostics', 'analysis'));
    }
}
