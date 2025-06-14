<?php

use App\Http\Controllers\AchievementController;
use App\Http\Controllers\ExtracurricularController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\GalleryCategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StatisticController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/achievements/{achievement}/image', [AchievementController::class, 'showImage'])->name('achievements.image.show');
Route::get('/extracurriculars/{extracurricular}/image', [ExtracurricularController::class, 'showImage'])->name('extracurriculars.image.show');
Route::get('/facilities/{facility}/image', [FacilityController::class, 'showImage'])->name('facilities.image.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('/achievements', AchievementController::class);
    Route::resource('/extracurriculars', ExtracurricularController::class);
    Route::resource('/facilities', FacilityController::class);
    Route::resource('/gallery-categories', GalleryCategoryController::class);

    Route::get('/statistics', [StatisticController::class, 'edit'])->name('statistics.edit');
    Route::post('/statistics', [StatisticController::class, 'update'])->name('statistics.update');
});

require __DIR__.'/auth.php';
