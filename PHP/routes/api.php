<?php

use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\ServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Users
Route::get('users/services', [ServiceController::class, 'viewAllServices']);

Route::get('users/equipmemts', [EquipmentController::class, 'viewAllEquipments']);