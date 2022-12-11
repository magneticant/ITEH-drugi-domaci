<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::get('/doctors', [DoctorController::class, 'index']);
// Route::get('/doctors/{id}', [DoctorController::class, 'show']);
// Route::get('/appointments', [AppointmentController::class, 'index']);
// Route::get('/appointments/{id}', [AppointmentController::class, 'show']);

Route::resource('appointments', AppointmentController::class);
Route::resource('doctors', DoctorController::class);
Route::resource('users', UserController::class);