<?php

use App\Http\Controllers\Admin\ExternalServiceLinkController as AdminExternalServiceLinkController;
use App\Http\Controllers\Admin\ExtracurricularController as AdminExtracurricularController;
use App\Http\Controllers\Admin\FacilityController as AdminFacilityController;
use App\Http\Controllers\Admin\GalleryCategoryController as AdminGalleryCategoryController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\NewsCategoryController as AdminNewsCategoryController;
use App\Http\Controllers\Admin\StaffController as AdminStaffController;
use App\Http\Controllers\Admin\StatisticController as AdminStatisticController;
use App\Http\Controllers\ExtracurricularController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/visi-misi', function () {
    return view('visi-misi');
})->name('visi-misi');

Route::get('/fasilitas', [FacilityController::class, 'index'])->name('fasilitas.index');
Route::get('/ekstrakurikuler', [ExtracurricularController::class, 'index'])->name('ekstrakurikuler.index');
Route::get('/guru-pegawai', [StaffController::class, 'index'])->name('guru-pegawai.index');

Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');

Route::get('/galleries/{gallery}/image', [AdminGalleryController::class, 'showImage'])->name('galleries.image.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('external-service-links', AdminExternalServiceLinkController::class)->except(['show']);
    Route::resource('extracurriculars', AdminExtracurricularController::class)->except(['show']);
    Route::resource('facilities', AdminFacilityController::class)->except(['show']);
    Route::resource('gallery-categories', AdminGalleryCategoryController::class)->except(['show']);
    Route::resource('gallery-categories.galleries', AdminGalleryController::class)
        ->scoped([
            'gallery_category' => 'slug',
        ])
        ->shallow()
        ->only(['index', 'store', 'destroy']);
    Route::resource('news-categories', AdminNewsCategoryController::class)->except(['show']);
    Route::resource('staff', AdminStaffController::class)->except(['show']);

    Route::get('/statistics', [AdminStatisticController::class, 'edit'])->name('statistics.edit');
    Route::post('/statistics', [AdminStatisticController::class, 'update'])->name('statistics.update');
});

require __DIR__.'/auth.php';
