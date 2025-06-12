<?php

use App\Http\Controllers\FacilityController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StatisticController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/facilities/{facility}/image', [FacilityController::class, 'showImage'])->name('facilities.image.show');
    Route::resource('facilities', FacilityController::class);

    Route::get('/statistics', [StatisticController::class, 'edit'])->name('statistics.edit');
    Route::post('/statistics', [StatisticController::class, 'update'])->name('statistics.update');
});

require __DIR__.'/auth.php';
