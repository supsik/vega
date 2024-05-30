<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\DiagnosticsController;
use App\Http\Controllers\OperationsController;
use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PricesController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TeamController;
use App\Http\Livewire\Pages\AnalysisPage;
use App\Http\Livewire\Pages\AppointmentPage;
use App\Http\Livewire\Pages\DoctorsPage;
use Illuminate\Support\Facades\Route;
use UniSharp\LaravelFilemanager\Lfm;
use App\Http\Controllers\User\ProfileController;

Route::group(['prefix' => 'laravel-filemanager'], function () {
    Lfm::routes();
})->middleware('moonshine');

Route::get('/', HomeController::class)->name('home');
Route::get('/about', AboutController::class)->name('about');
Route::get('/documents', DocumentsController::class)->name('documents');
Route::get('/contacts', ContactsController::class)->name('contacts');
Route::get('/analysis', AnalysisPage::class)->name('analysis');
Route::get('/prices', PricesController::class)->name('prices');
Route::get('/pages/{page:slug}', PagesController::class)->name('pages');
Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/diagnostics/{diagnostics:slug}', [DiagnosticsController::class, 'show'])->name('diagnostics.show');
Route::get('/operations-blocks', [OperationsController::class, 'showGeneral'])->name('operations.general');
Route::get('/operations-blocks/{slug}', [OperationsController::class, 'index'])->name('operations.index');
Route::get('/operations/{slug}', [OperationsController::class, 'show'])->name('operations.show');

Route::get('account', AccountController::class)
    ->middleware('guest')
    ->name('account.index');

Route::get('appointment', AppointmentPage::class)->name('appointment.index');

Route::resource('news', NewsController::class)
    ->only('index', 'show');

Route::resource('team', TeamController::class)
    ->only('index', 'show')
    ->parameter('team', 'employee');

Route::get('doctors', DoctorsPage::class)->name('doctors.index');
Route::get('doctors/speciality/{speciality}', [DoctorsController::class, 'speciality'])->name('doctors.speciality');
Route::get('doctors/{doctor:slug}', [DoctorsController::class, 'show'])->name('doctors.show');
