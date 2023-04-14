<?php

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
})->name('ads');

Route::get('/workers', function () {
    return view('workers.workers');
})->name('workers');
Route::get('/workers/details', function () {
    return view('workers.show');
})->name('workers');

Route::get('/contact-us', function () {
    return view('contact-us');
})->name('contact-us');

Route::get('/about-us', function () {
    return view('about');
})->name('about-us');

Route::get('/pricing', function () {
    return view('pricing');
})->name('pricing');


// Connexion page

Route::get('/sign-up', function () {
    return view('sign-up');
})->name('sign-up');

Route::get('/sign-in', function () {
    return view('sign-in');
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
