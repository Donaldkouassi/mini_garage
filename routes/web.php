<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\ClientWebController;
use App\Http\Controllers\Web\VehiculeWebController;
use App\Http\Controllers\Web\ReparationWebController;
use App\Http\Controllers\Web\TechnicienWebController;

Route::get('/', function () {
    return view('garage.dashboard');
})->name('garage.dashboard');

/*
|--------------------------------------------------------------------------
| Routes Clients
|--------------------------------------------------------------------------
*/

Route::get('/garage/clients', [ClientWebController::class, 'index'])->name('garage.clients.index');
Route::get('/garage/clients/create', [ClientWebController::class, 'create'])->name('garage.clients.create');
Route::post('/garage/clients', [ClientWebController::class, 'store'])->name('garage.clients.store');
Route::get('/garage/clients/{client}', [ClientWebController::class, 'show'])->name('garage.clients.show');
Route::get('/garage/clients/{client}/edit', [ClientWebController::class, 'edit'])->name('garage.clients.edit');
Route::put('/garage/clients/{client}', [ClientWebController::class, 'update'])->name('garage.clients.update');
Route::delete('/garage/clients/{client}', [ClientWebController::class, 'destroy'])->name('garage.clients.destroy');

/*
|--------------------------------------------------------------------------
| Routes Véhicules
|--------------------------------------------------------------------------
*/

Route::get('/garage/vehicules', [VehiculeWebController::class, 'index'])->name('garage.vehicules.index');
Route::get('/garage/vehicules/create', [VehiculeWebController::class, 'create'])->name('garage.vehicules.create');
Route::post('/garage/vehicules', [VehiculeWebController::class, 'store'])->name('garage.vehicules.store');
Route::get('/garage/vehicules/{vehicule}', [VehiculeWebController::class, 'show'])->name('garage.vehicules.show');
Route::get('/garage/vehicules/{vehicule}/edit', [VehiculeWebController::class, 'edit'])->name('garage.vehicules.edit');
Route::put('/garage/vehicules/{vehicule}', [VehiculeWebController::class, 'update'])->name('garage.vehicules.update');
Route::delete('/garage/vehicules/{vehicule}', [VehiculeWebController::class, 'destroy'])->name('garage.vehicules.destroy');

/*
|--------------------------------------------------------------------------
| Routes Réparations
|--------------------------------------------------------------------------
*/

Route::get('/garage/reparations', [ReparationWebController::class, 'index'])->name('garage.reparations.index');
Route::get('/garage/reparations/create', [ReparationWebController::class, 'create'])->name('garage.reparations.create');
Route::post('/garage/reparations', [ReparationWebController::class, 'store'])->name('garage.reparations.store');
Route::get('/garage/reparations/{reparation}/edit', [ReparationWebController::class, 'edit'])->name('garage.reparations.edit');
Route::put('/garage/reparations/{reparation}', [ReparationWebController::class, 'update'])->name('garage.reparations.update');
Route::delete('/garage/reparations/{reparation}', [ReparationWebController::class, 'destroy'])->name('garage.reparations.destroy');

/*
|--------------------------------------------------------------------------
| Routes Techniciens
|--------------------------------------------------------------------------
*/

Route::get('/garage/techniciens', [TechnicienWebController::class, 'index'])->name('garage.techniciens.index');
Route::get('/garage/techniciens/create', [TechnicienWebController::class, 'create'])->name('garage.techniciens.create');
Route::post('/garage/techniciens', [TechnicienWebController::class, 'store'])->name('garage.techniciens.store');
Route::get('/garage/techniciens/{technicien}/edit', [TechnicienWebController::class, 'edit'])->name('garage.techniciens.edit');
Route::put('/garage/techniciens/{technicien}', [TechnicienWebController::class, 'update'])->name('garage.techniciens.update');
Route::delete('/garage/techniciens/{technicien}', [TechnicienWebController::class, 'destroy'])->name('garage.techniciens.destroy');