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

    public function generateInitialsImage()
    {
        $user = session('user')['account'];

        $name = $user['username'];
        $initials = strtoupper($name[0]);

        $svgImage = '<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" xmlns:xlink="http://www.w3.org/1999/xlink">
        <rect width="100%" height="100%" fill="#5850EC" />
        <text x="50" y="54" font-family="Ubuntu, sans-serif" font-size="48" fill="#FFFFFF" text-anchor="middle" alignment-baseline="middle">' . $initials . '</text>
    </svg>';

        $filename = uniqid('', true);
        Storage::disk('public')->put('initials/' . $filename . '.svg', $svgImage);

        return 'initials/' . $filename;
    }


    protected function processAndStoreImage($uploadedImage, $folder, $username)
    {
        if (!$uploadedImage) {
            $initialsPath = $this->generateInitialsImage($username);
            return $initialsPath;
        }

        $filename = Str::random(40);
        $extension = $uploadedImage->getClientOriginalExtension();

        $originalPath = $uploadedImage->storeAs($folder, $filename . '.' . $extension, 'public');

        $webpPath = $this->createWebpImage($originalPath, $folder, $filename);

        return $folder . '/' . $filename;
    }

    protected function createWebpImage($originalPath, $folder, $filename)
    {
        $image = Image::make(Storage::path('public/' . $originalPath));
        $webpPath = $folder . '/' . $filename . '.webp';
        $image->save(Storage::path('public/' . $webpPath), 80, 'webp');

        return $webpPath;
    }
}
