<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Stripe\Customer;
use Stripe\PaymentMethod;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Cashier\Subscription;

class PaymentForm extends Component
{
    public $selectedPlan;
    public $email;
    public $firstName;
    public $lastName;
    public $company;
    public $address;
    public $apartment;
    public $region;
    public $postalCode;
    public $phone;
    protected $paymentMethods = [];
    public $paymentType;
    public $cardNumber;
    public $nameOnCard;
    public $expirationDate;
    public $cvc;

    public function mount()
    {
        Stripe::setApiKey(config('app.stripeKey'));

        $user = session('user')['account'];
        // Create a new customer
        $customer = Customer::create([
            'email' => $user['email'], // Customer's email
            'name' => $user['firstname'], // Customer's name
            'metadata' => [
                'user_id' => $user['id'], // Optional: You can associate your user ID here
            ],
        ]);

        // Retrieve the customer ID
        $customerId = $customer->id;


        $this->selectedPlan = session('productSelected')['product']['id'];
        $this->email = $user['account']['email'];
        $this->firstName = $user['account']['firstname'];
        $this->lastName = $user['account']['lastname'];
    }

    public function render()
    {
        return view('livewire.payment-form');
    }

    public function createSubscription()
    {
        // Create a PaymentIntent
        $paymentIntent = PaymentIntent::create([
            'amount' => 1000,  // Replace with the actual amount
            'currency' => 'usd',  // Replace with the desired currency
            'payment_method' => $this->paymentMethods[0]->id, // Replace with the selected payment method ID
            'confirm' => true,
        ]);

        // Create the user in your application's database and associate them with the Stripe customer ID
        $stripeCustomerId = $paymentIntent->customer;
        $user = session('user')['account'];

        // Begin database transaction for creating user and subscription
        DB::beginTransaction();
    }
}
