<?php

use App\Http\Controllers\AchievementController;
use App\Http\Controllers\Admin\AchievementController as AdminAchievementController;
use App\Http\Controllers\Admin\ExternalServiceLinkController as AdminExternalServiceLinkController;
use App\Http\Controllers\Admin\ExtracurricularController as AdminExtracurricularController;
use App\Http\Controllers\Admin\FacilityController as AdminFacilityController;
use App\Http\Controllers\Admin\GalleryCategoryController as AdminGalleryCategoryController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\NewsCategoryController as AdminNewsCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\PositionController as AdminPositionController;
use App\Http\Controllers\Admin\StaffController as AdminStaffController;
use App\Http\Controllers\Admin\StatisticController as AdminStatisticController;
use App\Http\Controllers\ExternalServiceLinkController;
use App\Http\Controllers\ExtracurricularController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsPublicController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/sambutan', function () {
    return view('sambutan');
})->name('greeting');

Route::get('/visi-misi', function () {
    return view('visi-misi');
})->name('vision-mission');

Route::get('/struktur-organisasi', function () {
    return view('struktur-organisasi');
})->name('organization-structure');

Route::get('/sejarah', function () {
    return view('sejarah');
})->name('history');

Route::prefix('berita')->name('news.')->group(function () {
    Route::get('/', [NewsPublicController::class, 'index'])->name('index');
    Route::get('/{category:slug}', [NewsPublicController::class, 'category'])->name('category');
    Route::get('/{category:slug}/{news:slug}', [NewsPublicController::class, 'show'])->name('show');
});

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

Route::middleware(['auth', 'verified'])->name('admin.')->group(function () {
    Route::resource('achievements', AdminAchievementController::class)->except(['show']);
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

    Route::resource('news', AdminNewsController::class)->except(['show']);
    Route::resource('news-categories', AdminNewsCategoryController::class)->except(['show']);
    Route::post('/upload-ckeditor-image', [AdminNewsController::class, 'uploadCkeditorImage'])->name('upload-ckeditor-image');

    Route::resource('positions', AdminPositionController::class)->except(['show']);
    Route::post('/positions/update-order', [AdminPositionController::class, 'updateOrder'])->name('positions.updateOrder');
    Route::resource('staff', AdminStaffController::class)->except(['show']);

    Route::get('/statistics', [AdminStatisticController::class, 'edit'])->name('statistics.edit');
    Route::post('/statistics', [AdminStatisticController::class, 'update'])->name('statistics.update');
});

require __DIR__.'/auth.php';
