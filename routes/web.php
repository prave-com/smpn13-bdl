<?php

use App\Http\Controllers\AchievementController;
use App\Http\Controllers\ExternalServiceLinkController;
use App\Http\Controllers\ExtracurricularController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\GalleryCategoryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\NewsCategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StatisticController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/achievements/{achievement}/image', [AchievementController::class, 'showImage'])->name('achievements.image.show');
Route::get('/extracurriculars/{extracurricular}/image', [ExtracurricularController::class, 'showImage'])->name('extracurriculars.image.show');
Route::get('/facilities/{facility}/image', [FacilityController::class, 'showImage'])->name('facilities.image.show');
Route::get('/galleries/{gallery}/image', [GalleryController::class, 'showImage'])->name('galleries.image.show');
Route::get('/staff/{staff}/image', [StaffController::class, 'showImage'])->name('staff.image.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('achievements', AchievementController::class)->except(['show']);
    Route::resource('external-service-links', ExternalServiceLinkController::class)->except(['show']);
    Route::resource('extracurriculars', ExtracurricularController::class)->except(['show']);
    Route::resource('facilities', FacilityController::class)->except(['show']);
    Route::resource('gallery-categories', GalleryCategoryController::class)->except(['show']);
    Route::resource('gallery-categories.galleries', GalleryController::class)
        ->scoped([
            'gallery_category' => 'slug',
        ])
        ->shallow()
        ->only(['index', 'store', 'destroy']);
    Route::resource('news-categories', NewsCategoryController::class)->except(['show']);
    Route::resource('staff', StaffController::class)->except(['show']);

    Route::get('/statistics', [StatisticController::class, 'edit'])->name('statistics.edit');
    Route::post('/statistics', [StatisticController::class, 'update'])->name('statistics.update');
});

require __DIR__.'/auth.php';
