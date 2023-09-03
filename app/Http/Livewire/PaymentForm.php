<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
    public $cardNumber;
    public $nameOnCard;
    public $expirationDate;
    public $cvc;
    public $paymentSuccessful = false;
    protected $paymentMethods = [];

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
        $user = User::where('email',session('user')['account']['email'])->first();

        $productSelected = session('productSelected')['product'];

        $planPayment = session('productSelected')['paymentYearly'] ? $productSelected['price_yearly'] : $productSelected['price_monthly'];
        $intent = $user->createSetupIntent();
        return view('livewire.payment-form',compact('planPayment','user','intent','productSelected'));
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
