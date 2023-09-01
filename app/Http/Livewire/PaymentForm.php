<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Cashier\Cashier;
use Livewire\Component;
use Stripe\Customer;
use Stripe\SetupIntent;
use Stripe\Stripe;

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
        $this->selectedPlan = session('productSelected')['product']['id'];
        $this->email = $user['email'];
        $this->firstName = $user['firstname'];
        $this->lastName = $user['lastname'];
    }

    public function render()
    {
        $user = session('user')['account'];

        // Check if the customer exists or create a new one
        $customer = Customer::all(['email' => $user['email']])->data[0] ?? null;

        if (!$customer) {
            // Customer doesn't exist, so create a new customer
            $customer = Customer::create([
                'email' => $user['email'],
                'name' => $user['firstname'],
            ]);
        }

        // Create a SetupIntent for the customer
        $setupIntent = SetupIntent::create([
            'customer' => $customer->id,
        ]);

        $intentClientSecret = $setupIntent->client_secret;

        return view('livewire.payment-form',compact('intentClientSecret'));
    }

    public function createSubscription()
    {
        Stripe::setApiKey(config('app.stripeKey'));

        $user = session('user')['account'];
        $productSelected = session('productSelected')['product'];
        $planPayment = session('productSelected')['paymentYearly'] ? $productSelected['price_yearly'] : $productSelected['price_monthly'];

        User::create([
            'username' => $user['username'] ?? '',
            'email' => $user['email'] ?? '',
            'about' => $user['about'] ?? '',
            'password' => Hash::make($user['password']) ?? '',
            'avatarUpload' => $user['avatarUpload'] ?? '',
            'backgroundUpload' => $user['backgroundUpload'] ?? '',
            'firstname' => $user['firstname'] ?? '',
            'lastname' => $user['lastname'] ?? '',
            'streetAddress' => $user['streetAddress'] ?? '',
            'city' => $user['city'] ?? '',
            'region' => $user['region'] ?? '',
            'postalCode' => $user['postalCode'] ?? '',
        ]);

        $newUser = User::where('email',$user['email'])->createSetupIntent();
        // Check if the customer already exists in Stripe
            $stripeCustomer = Customer::create([
                'email' => $user['email'],
                'name' => $user['firstname'],
                'metadata' => [
                    'user_id' => $user['id'],
                ],
            ]);


        $productSelected = session('productSelected')['product'];
        $planPayment = session('productSelected')['paymentYearly']
            ? $productSelected['price_yearly']
            : $productSelected['price_monthly'];

        // Create the subscription for the customer
        $subscription = $stripeCustomer->subscriptions->create([
            'items' => [
                [
                    'price' => $planPayment,
                ],
            ],
        ]);
    }
}
