<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
    }
}
