<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;

class AnalysisController extends Controller
{
    public function index(Request $request): View
    {
        $currentPage = $request->query('page', 1);

        $params = [
            'limit' => config('medods.per_page'),
            'offset' => ($currentPage - 1) * config('medods.per_page'),
            'kind' => 'analysis',
            'state' => 'ready',
            'clinicId' => config('medods.clinic_id'),
            'clientId' => $request->user()->medodsId,
        ];

        ['data' => $data, 'totalItems' => $totalItems] = app('medods')->entry()->list($params);

        $analysis = new LengthAwarePaginator(
            array_reverse($data),
            $totalItems,
            config('medods.per_page'),
            $currentPage,
            ['path' => route('user.analysis.index')]
        );

        return view('user.analysis.index', compact('analysis'));
    }

    public function show(int $analysisId): View
    {
        $analysis = app('medods')->entry()->find($analysisId);

        $doctorId = $analysis['userId'];

        $doctor = app('medods')->user()->find($doctorId);

        return view('user.analysis.show', compact('analysis', 'doctor'));
    }
}
