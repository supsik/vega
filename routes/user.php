<?php

use App\Http\Controllers\User\AnalysisController;
use App\Http\Controllers\User\AppointmentController;
use App\Http\Controllers\User\ConclusionsController;
use App\Http\Controllers\User\LogoutController;
use App\Http\Controllers\User\PdfController;
use App\Http\Controllers\User\ProfileController;

Route::group(['middleware' => 'auth', 'prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('logout', LogoutController::class)->name('logout');

    Route::resource('profile', ProfileController::class)
        ->only('index', 'update');

    Route::resource('appointment', AppointmentController::class)
        ->only('index', 'show', 'destroy');

    Route::resource('conclusions', ConclusionsController::class)
        ->only('index', 'show');

    Route::resource('analysis', AnalysisController::class)
        ->only('index', 'show');

    Route::get('pdf/{entryId}', PdfController::class)
        ->name('pdf');
});
