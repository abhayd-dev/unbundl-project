<?php

use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CarTypeController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicLeadController;
use App\Http\Controllers\PublicCarController;
use App\Http\Controllers\PublicPageController;
use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return redirect()->route('admin.dashboard');
});

require __DIR__.'/auth.php';

// Public Routes

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/leads', [PublicLeadController::class, 'store'])->name('leads.store');
Route::get('/cars', [PublicCarController::class, 'index'])->name('cars.index');
Route::get('/cars/{car}', [PublicCarController::class, 'show'])->name('cars.show');
Route::get('/about-us', [PublicPageController::class, 'about'])->name('pages.about');
Route::get('/contact-us', [PublicPageController::class, 'contact'])->name('pages.contact');
Route::get('/cars/{car}/brochure', [PublicCarController::class, 'downloadBrochure'])->name('cars.brochure');

// Admin Routes

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('car_types', CarTypeController::class);
    Route::resource('cars', CarController::class);
    Route::resource('banners', BannerController::class);
    
    Route::resource('leads', LeadController::class)->only(['index', 'destroy']);

    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [SettingController::class, 'update'])->name('settings.update');

    Route::resource('pages', PageController::class)->names('pages');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
});

