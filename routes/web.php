<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/how-it-works', function () {
    return view('how-it-works');
})->name('how-it-works');

Route::get('/ads', function () {
    return view('ads.ads');
})->name('ads');
Route::get('/ads/details', function () {
    return view('ads.show');
})->name('ads.show');

Route::get('/workers', function () {
    return view('workers.workers');
})->name('workers');

Route::get('/workers/details', function () {
    return view('workers.show');
})->name('workers.show');


Route::get('/contact-us', function () {
    return view('contact-us');
})->name('contact-us');

Route::get('/contact-us/post', [ContactController::class, 'store'])->name('contact-us.store');


Route::get('/about-us', function () {
    return view('about');
})->name('about-us');

Route::get('/pricing', function () {
    return view('pricing');
})->name('pricing');


// Connexion page

Route::get('/sign-up', function () {
    return view('connexion.sign-up.first-step');
})->name('sign-up.role');
Route::get('/sign-up/role', function () {
    return view('connexion.sign-up.second-step');
})->name('sign-up.account');
Route::get('/sign-up/account', function () {
    return view('connexion.sign-up.third-step');
})->name('sign-up.confirmation');
Route::get('/sign-up/payment', function () {
    return view('connexion.sign-up.payment-step');
})->name('sign-up.payment');


Route::post('/sign-up', function () {
    return request();
})->name('inscription.freelancers');


Route::get('/sign-in', function () {
    return view('connexion.sign-in');
})->name('sign-in');




// Legal views

Route::get('/privacy', function () {
    return view('legal.privacy');
})->name('privacy');
Route::get('/cookie', function () {
    return view('legal.cookie');
})->name('cookie');
Route::get('/disclaimer', function () {
    return view('legal.disclaimer');
})->name('disclaimer');
Route::get('/terms', function () {
    return view('legal.terms');
})->name('terms');


// Newsletter

Route::get('/newsletter',
    [\App\Http\Controllers\NewsletterController::class, 'storeNewsletterEmail'])->name('newsletter');


// Dashboard views

Route::get('/dashboard', function () {
    return view('dashboard.home');
})->name('dashboard.dashboard');

Route::get('/dashboard/profil', function () {
    return view('dashboard.profil');
})->name('dashboard.profil');

Route::get('/dashboard/messages', function () {
    return view('dashboard.messages');
})->name('dashboard.messages');

Route::get('/dashboard/plans', function () {
    return view('dashboard.plans');
})->name('dashboard.plans');

Route::get('/dashboard/settings', function () {
    return view('dashboard.settings');
})->name('dashboard.settings');

Route::post('/dashboard/settings/privacy', function () {
    return view('dashboard.settings');
})->name('dashboard.settings.privacy');

