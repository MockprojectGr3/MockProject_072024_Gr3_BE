<?php

use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\FeedbackServiceController;
use App\Http\Controllers\CustomerController;
use App\Models\ContactUs;
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

Route::prefix('ContactUs')->group(function(){
    Route::get('/',[ContactUsController::class, 'index']);
    Route::post('/', [ContactUsController::class, 'store']);
});

Route::prefix('feedback-services')->group(function(){
    Route::get('/', [FeedbackServiceController::class, 'index']);
    Route::post('/', [FeedbackServiceController::class, 'store']);
});

Route::prefix('customers')->group(function(){
    Route::get('/', [CustomerController::class, 'index']);
    Route::post('/', [CustomerController::class, 'store']);
    Route::get('/{id}', [CustomerController::class, 'show']);
    Route::put('/{id}', [CustomerController::class, 'update']);
    Route::delete('/{id}', [CustomerController::class, 'destroy']);
});

// Users
Route::get('users/services', [ServiceController::class, 'viewAllServices']);
Route::get('users/detail-service/{serviceId}', [ServiceController::class, 'viewDetailServices']);

Route::get('users/equipments', [EquipmentController::class, 'viewAllEquipments']);