<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Stripe\Stripe;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @throws \JsonException
     */
    public function run(): void
    {
        Stripe::setApiKey(config('app.stripeKey'));

        $products = \Stripe\Product::all();
        $pricingPlans = \Stripe\Price::all();

        // Create an array to hold the formatted product and pricing data
        $formattedProducts = [];
        foreach ($products as $product) {
            // Find pricing plans associated with the current product
            $productPricingPlans = array_filter($pricingPlans->data, function ($plan) use ($product) {
                return $plan->product == $product->id;
            });

            // Format the product and pricing plan data
            $formattedPricingPlans = [];
            foreach ($productPricingPlans as $plan) {
                $intervalKey = ($plan->recurring->interval === 'month') ? 'monthly' : 'yearly';
                $formattedPricingPlans[$intervalKey] = [
                    'id' => $plan->id,
                    'billing_scheme' => $plan->billing_scheme,
                    'amount' => number_format($plan->unit_amount / 100, 2),
                    'currency' => $plan->currency,
                    'interval' => $plan->recurring->interval,
                ];
            }

            $formattedProducts[] = [
                'product' => [
                    'id' => $product->id,
                    'name' => $product->name,
                    'description' => $product->description,
                    'features' => $product->metadata->features,
                    'images' => $product->images[0],
                    // Add more product details as needed
                ],
                'plans' => $formattedPricingPlans,
            ];
        }
        foreach ($formattedProducts as $plan) {
            Plan::create([
                'name' => $plan['product']['name'],
                'slug' => Str::slug($plan['product']['name']),
                'stripe_plan_yearly' => $plan['plans']['yearly']['id'],
                'price_yearly' => $plan['plans']['yearly']['amount'],
                'stripe_plan_monthly' => $plan['plans']['monthly']['id'],
                'image' => $plan['product']['images'],
                'price_monthly' => $plan['plans']['monthly']['amount'],
                'description' => $plan['product']['description'],
                'features' => json_encode($plan['product']['features'], JSON_THROW_ON_ERROR)
            ]);
        }
    }
}
