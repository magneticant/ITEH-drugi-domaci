<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorAppointmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\UserAppointmentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDoctorController;
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



// Route::get('/users', [UserController::class, 'index']);
//Route::get('/users/{id}', [UserController::class, 'show']);
// Route::resource('appointments', AppointmentController::class);
Route::resource('doctors', DoctorController::class);
Route::resource('users', UserController::class);

//Ugnjezdeni resursi

Route::get('/users/{id}/appointments', [UserAppointmentController::class, 'index'])->name('users.appointments.index');
Route::resource('users.doctors', UserDoctorController::class);
// Route::get('/doctors/{id}/appointments', [DoctorAppointmentController::class, 'index'])->name('doctors.appointments.index');
Route::resource('doctors.appointments', DoctorAppointmentController::class);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::group(['middleware'=>['auth:sanctum']], function(){
    Route::get('/userprofile', function(Request $request){
        return auth()->user();
    });
    Route::resource('appointments', AppointmentController::class)->only(['update', 'store', 'destroy']);

    Route::post('/logout', [AuthController::class, 'logout'] );
});

Route::resource('appointments', AppointmentController::class)->only(['index']);
