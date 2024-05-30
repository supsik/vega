<?php

use App\Http\Controllers\User\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('quick-search', [SearchController::class, 'quickSearch']);

Route::post('sendcode', [ProfileController::class,'sendSmsCode']);
Route::post('verifycode', [ProfileController::class,'confirmSmsCode']);
Route::post('register', [ProfileController::class,'registerUser']);
Route::post('forgot', [ProfileController::class,'forgotPassword']);
Route::post('login', [ProfileController::class,'login']);


