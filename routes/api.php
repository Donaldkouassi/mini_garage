<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\ReparationController;
use App\Http\Controllers\TechnicienController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('vehicules', VehiculeController::class);
Route::apiResource('reparations', ReparationController::class);
Route::apiResource('techniciens', TechnicienController::class);