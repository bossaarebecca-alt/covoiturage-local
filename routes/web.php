<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\TrajetController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Consultation publique des trajets (accessible sans connexion)
Route::get('/trajets', [TrajetController::class, 'index'])->name('trajets.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/vehicule', [VehiculeController::class, 'show'])->name('vehicule.show');
    Route::get('/vehicule/create', [VehiculeController::class, 'create'])->name('vehicule.create');
    Route::post('/vehicule', [VehiculeController::class, 'store'])->name('vehicule.store');

    Route::get('/trajets/create', [TrajetController::class, 'create'])->name('trajets.create');
    Route::post('/trajets', [TrajetController::class, 'store'])->name('trajets.store');
    Route::get('/mes-trajets', [TrajetController::class, 'mine'])->name('trajets.mine');
    Route::delete('/trajets/{trajet}', [TrajetController::class, 'destroy'])->name('trajets.destroy');
});

require __DIR__.'/auth.php';