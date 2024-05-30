<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class PdfController extends Controller
{
    public function __invoke(int $entryId): \Illuminate\Http\Response
    {
        $pdf = app('medods')->entry()->pdf($entryId);

        $response = Response::make($pdf, 200);

        $response->header('Content-Type', 'application/pdf');

        return $response;
    }
}
