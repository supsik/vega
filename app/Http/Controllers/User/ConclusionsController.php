<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;

class ConclusionsController extends Controller
{
    public function index(Request $request): View
    {
        $currentPage = $request->query('page', 1);

        $params = [
            'limit' => config('medods.per_page'),
            'offset' => ($currentPage - 1) * config('medods.per_page'),
            'kind' => 'service',
            'state' => 'ready',
            'clinicId' => config('medods.clinic_id'),
            'clientId' => $request->user()->medodsId,
        ];

        ['data' => $data, 'totalItems' => $totalItems] = app('medods')->entry()->list($params);

        $conclusions = new LengthAwarePaginator(
            array_reverse($data),
            $totalItems,
            config('medods.per_page'),
            $currentPage,
            ['path' => route('user.conclusions.index')]
        );

        return view('user.conclusions.index', compact('conclusions'));
    }

    public function show(int $conclusionId)
    {
        $conclusion = app('medods')->entry()->find($conclusionId);

        $doctorId = $conclusion['userId'];

        $doctor = app('medods')->user()->find($doctorId);

        return view('user.conclusions.show', compact('conclusion', 'doctor'));
    }
}
