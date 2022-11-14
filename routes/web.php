<?php

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::apiResource('users', UserController::class);
Route::apiResource('records', RecordController::class);
Route::apiResource('missions', MissionController::class);

Route::post('assign-mission', [DoctorController::class, 'assign']);

// Route::get('/', function () {
    // return view('welcome');
// });
