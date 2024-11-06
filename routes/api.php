<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return response()->json([
        "message" => "API is Working"
    ]);
});

// country routes
Route::controller(CountryController::class)->prefix("/countries")->group(function () {
    Route::get('/', 'countries');
    Route::post('/',  'create');
    Route::get('/{id}',  'Country');
    Route::put('/{id}',  'update');
    Route::delete('/{id}',  'delete');
});

// state routes
Route::controller(StateController::class)->prefix("/states")->group(function () {
    Route::get('/', 'states');
    Route::post('/',  'create');
    Route::get('/{id}',  'state');
    Route::put('/{id}',  'update');
    Route::delete('/{id}',  'delete');
});

// city routes
Route::controller(CityController::class)->prefix("/cities")->group(function () {
    Route::get('/', 'cities');
    Route::post('/',  'create');
    Route::get('/{id}',  'city');
    Route::put('/{id}',  'update');
    Route::delete('/{id}',  'delete');
});


// Route::middleware('auth:sanctum')->group(function () {
// });

// Authentication Routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
Route::post('/reset-password', [AuthController::class, 'resetPassword']);
