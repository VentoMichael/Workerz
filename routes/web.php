<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\WorkerController;
use Illuminate\Support\Facades\Route;
use Stripe\Stripe;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Home Page
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

// How It Works Page
Route::get('/how-it-works', [\App\Http\Controllers\HowItWorksController::class, 'index'])->name('how-it-works.index');

// Ads Routes
Route::prefix('ads')->group(function () {
    Route::controller(AdController::class)->group(function () {
        // Ads Index Page
        Route::get('/', 'index')->name('ads.index');
        // Ads Details Page
        Route::get('/details', 'show')->name('ads.show');
    });
});

// Workers Routes
Route::prefix('workers')->group(function () {
    Route::controller(WorkerController::class)->group(function () {
        // Workers Index Page
        Route::get('/',  'index')->name('workers.index');
        // Workers Details Page
        Route::get('/{name}', 'show')->name('workers.show');
    });
});

// Contact Us Routes
Route::prefix('contact-us')->group(function () {
    Route::controller(ContactController::class)->group(function () {
        // Contact Us Index Page
        Route::get('/', 'index')->name('contact-us.index');
        // Contact Us Store Page
        Route::post('/post', 'store')->name('contact-us.store');
    });
});

// About Us Page
Route::get('/about-us', [\App\Http\Controllers\AboutController::class,'index'])->name('about-us.index');

// Pricing Page
Route::get('/pricing', [\App\Http\Controllers\PriceController::class,'index'])->name('pricing.index');

// Sign Up Routes
Route::prefix('sign-up')->group(function () {
    Route::controller(RegistrationController::class)->group(function () {
        // Step 1: User role selection
        Route::get('/', 'showRoleForm')->name('sign-up.role');
        Route::post('/', 'storeRole')->name('post.sign-up.role');

        // Step 2: User account information
        Route::get('/account', 'showAccountForm')->name('sign-up.account');
        Route::post('/account', 'storeAccount')->name('post.sign-up.account');

        // Step 3: Payment / confirmation
        Route::get('/confirmation', 'showConfirmationForm')->name('sign-up.confirmation');
        Route::post('/confirmation', 'storeConfirmation')->name('post.sign-up.confirmation');
    });
});

// Legal Views Routes
Route::get('/privacy', [\App\Http\Controllers\PrivacyController::class, 'index'])->name('privacy.index');
Route::get('/cookie', [\App\Http\Controllers\CookieController::class, 'index'])->name('cookie.index');
Route::get('/disclaimer', [\App\Http\Controllers\DisclaimerController::class, 'index'])->name('disclaimer.index');
Route::get('/terms', [\App\Http\Controllers\TermsController::class, 'index'])->name('terms.index');

// Newsletter Page
Route::get('/newsletter',[\App\Http\Controllers\NewsletterController::class, 'index'])->name('newsletter.index');

// Authenticated User Routes
Route::middleware(['auth'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::controller(DashboardController::class)->group(function () {
            // Dashboard Index Page
            Route::get('/', 'index')->name('dashboard.index');
            // Dashboard Profile Page
            Route::get('/profil', 'profil')->name('dashboard.profil');
            // Dashboard Messages Page
            Route::get('/messages', 'messages')->name('dashboard.messages');
            // Dashboard Plans Page
            Route::get('/plans', 'plans')->name('dashboard.plans');
            // Plan Change Routes
            Route::get('/plan-change', 'plansChange')->name('dashboard.plan-change');
            Route::post('/plan-change', 'plansChangePost')->name('dashboard.plan-change.post');
            // Settings Routes
            Route::get('/settings', 'settings')->name('dashboard.settings');
            // Password Update Route
            Route::get('/password', 'updatePassword')->name('dashboard.update');
            // Settings Update Route
            Route::post('/settings', 'updateSettings')->name('dashboard.settings.privacy');
            // Delete Account Route
            Route::get('/delete', 'delete')->name('dashboard.delete');
        });
    });
});
