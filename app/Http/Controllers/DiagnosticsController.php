<?php

namespace App\Http\Controllers;

use App\Models\Diagnostics;
use Illuminate\View\View;

class DiagnosticsController extends Controller
{
    public function show(Diagnostics $diagnostics): View
    {
        $diagnostics->load([
            'doctors.media',
            'services',
        ]);


        return view('diagnostics.show', compact('diagnostics'));
    }
}
