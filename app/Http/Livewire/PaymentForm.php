<?php

namespace App\Http\Livewire;

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
        $this->planPayment = $price;
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
        $user = User::where('email', session('user')['account']['email'])->first();
        $productSelected = session('productSelected')['product'];
        $planPayment = $this->planPayment;
        $yearlyPayment = session('productSelected')['paymentYearly'];
        $intent = $user->createSetupIntent();
        return view('livewire.payment-form', compact('user', 'yearlyPayment','intent', 'productSelected', 'planPayment'));
    }

    public function clearMessage($property)
    {
        $this->$property = null;
    }
}
