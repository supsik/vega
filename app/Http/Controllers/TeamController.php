<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\View\View;

class TeamController extends Controller
{
    public function index(): View
    {
        $employees = Employee::query()
            ->with('position', 'media')
            ->select(['id', 'slug', 'first_name', 'second_name', 'position_id'])
            ->oldest('second_name')
            ->get();


        return view('team.index', compact('employees'));
    }

    public function show(Employee $employee): View
    {
        return view('team.show', compact('employee'));
    }
}
