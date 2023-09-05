<?php

namespace App\Http\Livewire;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

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

    public function mount()
    {
        // Load user data from the session if available
        $userData = session('user', []);

        // Set Livewire properties with the session data
        $this->username = $userData['account']['username'] ?? '';
        $this->about = $userData['account']['about'] ?? '';
        $this->firstname = $userData['account']['firstname'] ?? '';
        $this->lastname = $userData['account']['lastname'] ?? '';
        $this->email = $userData['account']['email'] ?? '';
        $this->password = $userData['account']['password'] ?? '';
        $this->streetAddress = $userData['account']['streetAddress'] ?? '';
        $this->city = $userData['account']['city'] ?? '';
        $this->region = $userData['account']['region'] ?? '';
        $this->postalCode = $userData['account']['postalCode'] ?? '';
        $this->plan = $userData['account']['plan'] ?? '';
    }

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

    public function submitForm()
    {
        $products = Plan::all();
        foreach ($products as $product) {
            if ($this->plan === $product['name']) {
                $productData = [
                    'product' => $product,
                    'paymentYearly' => $this->annualBilling,
                ];
                session(['productSelected' => $productData]);
            }
        }

        $user = session('user', []);
        $user['account'] = [
            'username' => $this->username,
            'about' => $this->about,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'password' => $this->password,
            'avatarUpload' => $this->processAndStoreImage($this->avatarUpload, 'avatars', $this->username),
            'backgroundUpload' => $this->backgroundUpload ? $this->processAndStoreImage($this->backgroundUpload, 'covers', $this->username) : 'covers/default_background',
            'streetAddress' => $this->streetAddress,
            'city' => $this->city,
            'region' => $this->region,
            'postalCode' => $this->postalCode,
            'plan' => $this->plan
        ];
        session(['user' => $user]);

        if (!request()->has('changePlan')) {
            User::create([
                'username' => $this->username ?? '',
                'about' => $this->about ?? '',
                'firstname' => ucfirst($this->firstname) ?? '',
                'lastname' => ucfirst($this->lastname) ?? '',
                'email' => $this->email ?? '',
                'password' => Hash::make($this->password) ?? '',
                'avatarUpload' => $this->avatarUpload ?? '',
                'backgroundUpload' => $this->backgroundUpload ?? '',
                'streetAddress' => $this->streetAddress ?? '',
                'city' => $this->city ?? '',
                'region' => $this->region ?? '',
                'postalCode' => $this->postalCode ?? '',
            ]);
        }
        sleep(1);
        return redirect()->route('sign-up.confirmation');
    }

    public function generateInitialsImage()
    {
        $name = $this->username;
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


    public function render()
    {
        $plans = Plan::all();
        return view('livewire.freelancer-form', compact('plans'));
    }
}
