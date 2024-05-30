<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DocumentsController extends Controller
{
    public function __invoke(Request $request): View
    {
        $documents = Document::query()
            ->with('media')
            ->get();

        return view('documents', compact('documents'));
    }
}
