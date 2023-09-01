<?php

namespace App\Http\Livewire;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;
use Stripe\Stripe;

class FreelancerForm extends Component
{
    use WithFileUploads;

    public $username;
    public $about;
    public $avatarUpload;
    public $backgroundUpload;
    public $firstname;
    public $lastname;
    public $email;
    public $password;
    public $passwordVisible;
    public $streetAddress;
    public $city;
    public $region;
    public $postalCode;
    public $plan;
    public $annualBilling = false;

    protected $rules = [
        'username' => 'required|unique:users',
        'about' => 'required|min:10',
        'avatarUpload' => 'nullable|image|mimes:jpeg,png|max:1024',
        'backgroundUpload' => 'nullable|image|mimes:jpeg,png|max:1024',
        'firstname' => 'required',
        'lastname' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8',
        'streetAddress' => 'required',
        'city' => 'required',
        'region' => 'required',
        'postalCode' => 'required|integer',
        'plan' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function toggleAnnualBilling()
    {
        $this->annualBilling = !$this->annualBilling;
    }
    public function togglePasswordVisibility()
    {
        $this->passwordVisible = !$this->passwordVisible;
    }
    public function submitForm(){
        $products = Plan::all();
        foreach ($products as $product){
            if ($this->plan === $product['name']){
                $productData = [
                    'product' => $product,
                    'paymentYearly' => $this->annualBilling,
                ];
                session(['productSelected' => $productData]);
            }
        }
        $signUp['username'] = $this->username;
        $signUp['about'] = $this->about;
        $signUp['avatarUpload'] = $this->avatarUpload;
        $signUp['backgroundUpload'] = $this->backgroundUpload;
        $signUp['firstname'] = $this->firstname;
        $signUp['lastname'] = $this->lastname;
        $signUp['email'] = $this->email;
        $signUp['password'] = $this->password;
        $signUp['passwordVisible'] = $this->passwordVisible;
        $signUp['streetAddress'] = $this->streetAddress;
        $signUp['city'] = $this->city;
        $signUp['region'] = $this->region;
        $signUp['postalCode'] = $this->postalCode;
        $signUp['plan'] = $this->plan;
        $this->validate();

        $user = session('user', []);
        $user['account'] = [
            'username' => $this->username,
            'about' => $this->about,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'password' => $this->password,
            'avatarUpload' => $this->processAndStoreImage($this->avatarUpload, 'avatars', $this->username),
            'backgroundUpload' => $this->processAndStoreImage($this->avatarUpload, 'covers', $this->username),
            'streetAddress' => $this->streetAddress,
            'city' => $this->city,
            'region' => $this->region,
            'postalCode' => $this->postalCode,
            'plan' => $this->plan
            ];
        if ($this->avatarUpload) {
            $avatarPath = $this->avatarUpload->store('avatars', 'public');
            $user['account']['avatarUpload'] = $avatarPath;
        }
        if ($this->backgroundUpload) {
            $coverPath = $this->backgroundUpload->store('cover', 'public');
            $user['account']['backgroundUpload'] = $coverPath;
        }
        session(['user' => $user]);

        sleep(1);
        return redirect()->route('sign-up.confirmation');
    }

    public function generateInitialsImage()
    {
        $name = $this->username;
        $initials = strtoupper($name[0]);

        $image = Image::canvas(100, 100);

        // Add a colored background
        $bgColor = '#CCCCCC';
        $image->rectangle(0, 0, 100, 100, function ($draw) use ($bgColor) {
            $draw->background($bgColor);
        });

        // Add the initials text
        $textColor = '#FFFFFF'; // White text color
        $image->text($initials, 50, 50, function ($font) use ($textColor) {
            $font->file(public_path('path-to-your-font.ttf'));
            $font->size(48);
            $font->color($textColor);
            $font->align('center');
            $font->valign('middle');
        });

        // Save the image to a temporary directory
        $filename = uniqid('initials_image_') . '.png';
        $image->save(public_path('temp/' . $filename));

        return '/temp/' . $filename;
    }
    protected function processAndStoreImage($uploadedImage, $folder, $username)
    {
        if (!$uploadedImage) {
            // Generate initials image
            $initialsImageUrl = $this->generateInitialsImage($username);
            return [
                'initials' => $initialsImageUrl,
            ];
        }

        $filename = Str::random(40);
        $originalPath = $uploadedImage->storeAs($folder, $filename . '.' . $uploadedImage->getClientOriginalExtension(), 'public');

        // Create and store optimized WebP version
        $webpPath = $this->createWebpImage($originalPath, $folder, $filename);

        // Convert to different formats (e.g., JPG, PNG)
        $jpgPath = $this->convertToFormat($originalPath, $folder, $filename, 'jpg');

        return [
            'original' => $originalPath,
            'webp' => $webpPath,
            'jpg' => $jpgPath,
        ];
    }

    protected function createWebpImage($originalPath, $folder, $filename)
    {
        $image = Image::make(storage_path('app/public/' . $originalPath));
        $webpPath = $folder . '/' . $filename . '.webp';
        $image->save(storage_path('app/public/' . $webpPath), 80, 'webp');

        return $webpPath;
    }

    protected function convertToFormat($originalPath, $folder, $filename, $format)
    {
        $image = Image::make(storage_path('app/public/' . $originalPath));
        $newPath = $folder . '/' . $filename . '.' . $format;
        $image->save(storage_path('app/public/' . $newPath), 80, $format);

        return $newPath;
    }


    public function render()
    {
        $plans = Plan::all();
        return view('livewire.freelancer-form',compact('plans'));
    }
}
