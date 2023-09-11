<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\RegistrationController;
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

Route::get('/workers/{username}', function () {
    return view('workers.show');
})->name('workers.show');


Route::get('/contact-us', function () {
    return view('contact-us');
})->name('contact-us');

Route::post('/contact-us/post', [ContactController::class, 'store'])->name('contact-us.store');


Route::get('/about-us', function () {
    return view('about');
})->name('about-us');

Route::get('/pricing', function () {
    Stripe::setApiKey(config('app.stripeKey'));

    // Fetch the products from Stripe
    $products = \Stripe\Product::all();
    $pricingPlans = \Stripe\Price::all();

    // Create an array to hold the formatted product and pricing data
    $formattedProducts = [];

    foreach ($products as $product) {
        // Find pricing plans associated with the current product
        $productPricingPlans = array_filter($pricingPlans->data, function ($plan) use ($product) {
            return $plan->product == $product->id;
        });

        // Retrieve product details, including features
        $stripeProduct = \Stripe\Product::retrieve($product->id);
        $features = explode(',', $stripeProduct->metadata['features'] ?? '');
        // Format the product and pricing plan data
        $formattedPricingPlans = [];
        foreach ($productPricingPlans as $plan) {
            $intervalKey = ($plan->recurring->interval === 'month') ? 'monthly' : 'yearly';
            $formattedPricingPlans[$intervalKey] = [
                'id' => $plan->id,
                'billing_scheme' => $plan->billing_scheme,
                'amount' => number_format($plan->unit_amount / 100, 2), // Convert cents to currency
                'currency' => $plan->currency,
                'interval' => $plan->recurring->interval,
            ];
        }

        $formattedProducts[] = [
            'product' => [
                'id' => $product->id,
                'name' => $product->name,
                'description' => $product->description,
                'features' => $features,
            ],
            'pricingPlans' => $formattedPricingPlans,
        ];
    }

    return view('pricing', compact('formattedProducts'));
})->name('pricing');



// Step 1: User role selection
Route::get('/sign-up', [RegistrationController::class, 'showRoleForm'])->name('sign-up.role');
Route::post('/sign-up', [RegistrationController::class, 'storeRole'])->name('post.sign-up.role');

// Step 2: User account information
Route::get('/sign-up/account', [RegistrationController::class, 'showAccountForm'])->name('sign-up.account');
Route::post('/sign-up/account', [RegistrationController::class, 'storeAccount'])->name('post.sign-up.account');

// Step 3: Payment / confirmation
Route::get('/sign-up/confirmation', [RegistrationController::class, 'showConfirmationForm'])->name('sign-up.confirmation');
Route::post('/sign-up/confirmation', [RegistrationController::class, 'storeConfirmation'])->name('post.sign-up.confirmation');






//
//Route::get('/sign-in', function () {
//    return view('connexion.sign-in');
//})->name('sign-in');




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

// Routes accessible only to authenticated users
 Route::middleware(['auth'])->group(function () {
    // Dashboard views
    Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.dashboard');

    Route::get('/dashboard/profil', [\App\Http\Controllers\DashboardController::class, 'profil'])->name('dashboard.profil');

    Route::get('/dashboard/messages', [\App\Http\Controllers\DashboardController::class, 'messages'])->name('dashboard.messages');

    Route::get('/dashboard/plans', [\App\Http\Controllers\DashboardController::class, 'plans'])->name('dashboard.plans');

    Route::get('/dashboard/settings', [\App\Http\Controllers\DashboardController::class, 'settings'])->name('dashboard.settings');
    Route::put('/dashboard/password', [DashboardController::class, 'updatePassword'])->middleware(['auth'])->name('password.update');
    Route::post('/dashboard/settings', [\App\Http\Controllers\DashboardController::class, 'updateSettings'])->name('dashboard.settings.privacy');
    Route::delete('/dashboard/delete', [\App\Http\Controllers\DashboardController::class, 'deleteAccount'])->name('dashboard.settings.delete');
 });












