<?php

namespace App\Http\Livewire;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
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
    public $paymentType;
    public $creditCard;

    public $cardNumber;
    public $previousSubscription;
    public $planPayment;
    public $nameOnCard;
    protected $paymentMethods = [];
    protected $listeners = ['productDataUpdated' => 'updatePlanPayment'];

    public function mount()
    {
        Stripe::setApiKey(config('app.stripeKey'));
        $user = session('user')['account'];
        $this->selectedPlan = session('productSelected')['product']['id'];
        $productSelected = session('productSelected')['product'];
        $price = session('productSelected')['paymentYearly'] ? $productSelected['price_yearly'] : $productSelected['price_monthly'];

        $this->email = $user['email'];

        $plans = Plan::all();
        $previousPrice = 0;
        if (Auth::user()) {
            $user = Auth::user();

            $stripePlanNames = [];
            $matchedPlan = null;
            foreach ($plans as $plan) {
                $stripePlanNames[] = $plan->name;
            }
            foreach ($stripePlanNames as $planName) {
                $this->previousSubscription = $user->subscriptions->first();
                if ($this->previousSubscription['name'] === $planName) {
                    $matchedPlan = $planName;
                    break;
                }
            }
            $previousPrice = $this->previousSubscription->price;
        }
        $this->planPayment = $this->previousSubscription ? $price - $previousPrice : $price;

        dump($previousPrice,$this->planPayment,$this->previousSubscription,$price);

        //TODO::NOT SHOWING THE PREVIOUS SUBSCRIPTION IN THE PAYMENT
        if ($this->planPayment < 0) {
            $this->planPayment = 0;
        }
        session()->put('price', $this->planPayment);
        $this->firstName = $user['firstname'];
        $this->lastName = $user['lastname'];
    }

    public function updatePlanPayment($newProductData)
    {
        $product = $newProductData['product'];
        $this->planPayment = $newProductData['paymentYearly'] ? $product['price_yearly'] : $product['price_monthly'];
        session('price', $this->planPayment);
    }

    public function render()
    {
        $user = session('user') !== null ? User::where('email', session('user')['account']['email'])->first() : Auth::user();
        $productSelected = session('productSelected')['product'];
        $planPayment = $this->planPayment;
        $yearlyPayment = session('productSelected')['paymentYearly'];
        $intent = $user->createSetupIntent();
        return view('livewire.payment-form', compact('user', 'yearlyPayment', 'intent', 'productSelected', 'planPayment'));
    }

    public function clearMessage($property)
    {
        $this->$property = null;
    }
}
