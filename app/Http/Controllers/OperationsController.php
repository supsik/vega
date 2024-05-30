<?php

namespace App\Http\Controllers;

use App\Models\OperationBlock;
use App\Models\Operations;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\ToArray;

class OperationsController extends Controller
{
    public function index(): View
    {
        // $operations->load([
        //     'operations.media',
        // ]);

        $operations = OperationBlock::where('slug', request('slug'))
            ->with('operations')
            ->first();

        // echo '<pre>'.htmlentities(print_r($operations->toArray(), true)).'</pre>';exit();
        return view('operations.index', compact('operations'));
    }

    public function show(): View
    {
        $operations = Operations::where('slug', request('slug'))
            ->with('doctors.media')
            ->first();


        return view('operations.show', compact('operations'));
    }
    public function showGeneral(): View
    {
        // all directions with operations 
        $directions = OperationBlock::all();
        $directions->load(['operations.media']);
        // html content from moonshine pages
        $moonPageContent = PagesController::getContentBySlug('operations-block')->content;


        return view('operations.general', compact('directions','moonPageContent'));
    }

}
