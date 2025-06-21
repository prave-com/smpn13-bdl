<?php

use App\Http\Controllers\AchievementController;
use App\Http\Controllers\Admin\AchievementController as AdminAchievementController;
use App\Http\Controllers\Admin\ExternalServiceLinkController as AdminExternalServiceLinkController;
use App\Http\Controllers\Admin\ExtracurricularController as AdminExtracurricularController;
use App\Http\Controllers\Admin\FacilityController as AdminFacilityController;
use App\Http\Controllers\Admin\GalleryCategoryController as AdminGalleryCategoryController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\NewsCategoryController as AdminNewsCategoryController;
use App\Http\Controllers\Admin\StaffController as AdminStaffController;
use App\Http\Controllers\Admin\StatisticController as AdminStatisticController;
use App\Http\Controllers\ExternalServiceLinkController;
use App\Http\Controllers\ExtracurricularController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/visi-misi', function () {
    return view('visi-misi');
})->name('vision-mission');

Route::get('/sejarah', function () {
    return view('sejarah');
})->name('history');

Route::get('/fasilitas', [FacilityController::class, 'index'])->name('facilities.index');
Route::get('/prestasi', [AchievementController::class, 'index'])->name('achievements.index');
Route::get('/ekstrakurikuler', [ExtracurricularController::class, 'index'])->name('extracurriculars.index');
Route::get('/guru-pegawai', [StaffController::class, 'index'])->name('staff.index');
Route::get('/link-layanan-eksternal', [ExternalServiceLinkController::class, 'index'])->name('external-service-links.index');
Route::get('/galeri', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/galeri/{galleryCategory:slug}', [GalleryController::class, 'show'])->name('gallery.show');

Route::get('/kontak', function () {
    return view('kontak');
})->name('contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('achievements', AdminAchievementController::class)->except(['show'])->names('admin.achievements');
    Route::resource('external-service-links', AdminExternalServiceLinkController::class)->except(['show'])->names('admin.external-service-links');
    Route::resource('extracurriculars', AdminExtracurricularController::class)->except(['show'])->names('admin.extracurriculars');
    Route::resource('facilities', AdminFacilityController::class)->except(['show'])->names('admin.facilities');
    Route::resource('gallery-categories', AdminGalleryCategoryController::class)->except(['show'])->names('admin.gallery-categories');
    Route::resource('gallery-categories.galleries', AdminGalleryController::class)
        ->scoped([
            'gallery_category' => 'slug',
        ])
        ->shallow()
        ->only(['index', 'store', 'destroy'])->names('admin.gallery-categories.galleries');
    Route::resource('news-categories', AdminNewsCategoryController::class)->except(['show'])->names('admin.news-categories');
    Route::resource('staff', AdminStaffController::class)->except(['show'])->names('admin.staff');

    Route::get('/statistics', [AdminStatisticController::class, 'edit'])->name('admin.statistics.edit');
    Route::post('/statistics', [AdminStatisticController::class, 'update'])->name('admin.statistics.update');
});

require __DIR__.'/auth.php';
