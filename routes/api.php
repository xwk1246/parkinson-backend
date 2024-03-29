<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\UserController;

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

// Route::middleware('auth:sanctum')->get('/current-user', function (Request $request) {
// return $request->user();
// });


Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('users', UserController::class);
    Route::apiResource('records', RecordController::class);
    Route::apiResource('missions', MissionController::class);

    // general
    Route::get('user-info', [GeneralController::class, 'info']);
    Route::get('assoc-record/{patientId?}', [GeneralController::class, 'record']);
    Route::get('video/{recordId}', [GeneralController::class, 'video']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('update-password',[AuthController::class,'updatePassword']);

    // doctor
    Route::post('add-patient', [DoctorController::class, 'addPatient']);
    Route::post('assign-mission', [DoctorController::class, 'assign']);
    Route::patch('update-comment', [DoctorController::class, 'updateComment']);
    Route::post('/reset-password/{user}', [AuthController::class, 'reset']);

    // patient
    Route::post('upload-video', [PatientController::class, 'uploadVideo']);
    Route::post('upload-record', [PatientController::class, 'uploadRecord']);
});
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
