<?php

namespace App\Http\Livewire;

use App\Models\Plan;
use App\Models\Region;
use App\Models\Role;
use App\Models\Skill;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class CustomerForm extends Component
{
    use WithFileUploads;

    public $avatarUpload;
    public $phoneNumber1;
    public $phoneNumber2;
    public $phoneNumber3;
    public $showPhoneNumber2 = false;
    public $showPhoneNumber3 = false;
    public $backgroundUpload;
    public $tempUrlAvatar;
    public $firstname;
    public $lastname;
    public $email;
    public $password;
    public $passwordVisible;
    public $streetAddress;
    public $city;
    public $postalCode;
    protected $avatarSizes = ['32x32', '160x160', '128x128'];
    protected $backgroundSizes = ['1980x192', '1280x192', '680x192'];

    public $typeRegion;
    public $showRegionsList = false;
    public $filteredRegions = [];
    public $selectedRegions = [];
    public $regions = [];
    public $maxRegions = 1;


    protected $rules = [
        'avatarUpload' => 'nullable|image|mimes:jpeg,png,svg,webp|max:1024',
        'firstname' => 'required',
        'lastname' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8',
        'streetAddress' => 'required',
        'city' => 'required',
        'postalCode' => 'required|integer',
        'phoneNumber1' => 'nullable|numeric|unique:phone_numbers,number|phone:BE',
        'phoneNumber2' => 'nullable|numeric|unique:phone_numbers,number|phone:BE',
        'phoneNumber3' => 'nullable|numeric|unique:phone_numbers,number|phone:BE',

    ];

    public function mount()
    {
        $userData = session('user', []);

        $this->firstname = $userData['account']['firstname'] ?? '';
        $this->lastname = $userData['account']['lastname'] ?? '';
        $this->email = $userData['account']['email'] ?? '';
        $this->streetAddress = $userData['account']['streetAddress'] ?? '';
        $this->city = $userData['account']['city'] ?? '';
        $this->postalCode = $userData['account']['postalCode'] ?? '';
        $this->regions = Region::all()->toArray();
    }

    public function addPhoneNumbers()
    {
        if (!$this->showPhoneNumber2) {
            $this->showPhoneNumber2 = true;
        } elseif ($this->showPhoneNumber2 && !$this->showPhoneNumber3) {
            $this->showPhoneNumber3 = true;
        }
    }

    public function updatedAvatarUpload()
    {
        try {
            $this->tempUrlAvatar = $this->avatarUpload->temporaryUrl();
        } catch (Exception $e) {
            $this->tempUrlAvatar = '';
        }
    }

    public function removePhoneNumber2()
    {
        $this->phoneNumber2 = null;
        $this->showPhoneNumber2 = false;
    }

    public function removePhoneNumber3()
    {
        $this->phoneNumber3 = null;
        $this->showPhoneNumber3 = false;
    }


    public function toggleRegionsList()
    {
        $this->showRegionsList = !$this->showRegionsList;

        if ($this->showRegionsList) {
            $this->filteredRegions = $this->regions;
        } else {

            $this->typeRegion = '';
            $this->filteredRegions = $this->regions;
        }
    }

    public function removeRegion($regionId)
    {
        if (($key = array_search($regionId, $this->selectedRegions)) !== false) {
            unset($this->selectedRegions[$key]);
        }
        $this->selectedRegions = array_values($this->selectedRegions);
    }

    public function addRegion($region)
    {

        $region = trim($region);

        $selectedRegionsLower = array_map('strtolower', $this->selectedRegions);

        if (
            !empty($region) &&
            !in_array(strtolower($region), $selectedRegionsLower) &&
            count($this->selectedRegions) < $this->maxRegions
        ) {
            $this->selectedRegions[] = $region;
            $this->showRegionsList = false;
            $this->highlightedRegion = null;
            $this->reset('typeRegion');
        }
    }

    public function filterRegions()
    {

        $this->filteredRegions = array_values(array_filter($this->regions, function ($region) {
            return !in_array(strtolower($region['name']), array_map('strtolower', $this->selectedRegions))
                && stripos($region['name'], strtolower($this->typeRegion)) !== false;
        }));
        $this->showRegionsList = true;
    }


    public function updated($property)
    {
        $this->validateOnly($property);

    }


    public function togglePasswordVisibility()
    {
        $this->passwordVisible = !$this->passwordVisible;
    }

    public function getSelectedRegionNames()
    {
        return collect($this->regions)->filter(function ($region) {
            return in_array($region['id'], $this->selectedRegions);
        })->pluck('name');
    }

    public function getSelectedRegionNameId()
    {
        $selectedRegions = collect($this->regions)->filter(function ($region) {
            return in_array($region['id'], $this->selectedRegions);
        });

        return $selectedRegions->pluck('name', 'id');
    }

    public function saveRegionsForCompany($user)
    {
        $selectedRegionNames = $this->getSelectedRegionNames();

        $regions = Region::whereIn('name', $selectedRegionNames)->get();
            $user->company()->regions()->sync($regions);
    }

    public function saveRegionForUser($user)
    {
        $selectedRegionNames = $this->getSelectedRegionNames();

        $region = Region::whereIn('name', $selectedRegionNames)->first();
        $user->region()->associate($region);

    }

    public function submitForm()
    {
        $this->validate();
        $userData = [
            'firstname' => ucfirst($this->firstname),
            'lastname' => ucfirst($this->lastname),
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'avatarUpload' => $this->processAndStoreImage($this->avatarUpload, 'avatars', $this->firstname . "_" . $this->lastname, true),
            'streetAddress' => $this->streetAddress,
            'city' => $this->city,
            'postalCode' => $this->postalCode,
        ];
        $user = session('user', []);
        $user['account'] = $userData;
        session(['user' => $user]);
        $newUser = User::create($userData);
        $newUser->role()->associate(Role::find($user['role']));
        $this->saveRegionForUser($newUser);
        $newUser->save();
        $phoneNumbers = [$this->phoneNumber1, $this->phoneNumber2, $this->phoneNumber3,
        ];
        $phoneNumbers = array_filter($phoneNumbers, function ($value) {
            return !is_null($value);
        });
        foreach ($phoneNumbers as $phoneNumber) {
            $newUser->phoneNumbers()->create(['number' => $phoneNumber]);
        }
        if (!$newUser->simpleuser()){
            $this->saveRegionsForCompany($newUser);
        }
        sleep(1);
        Auth::login($newUser);
        return redirect()->route('dashboard.index');
    }


    public function generateInitialsImage($folder, $username)
    {
        $name = $this->firstname . "_" . $this->lastname;
        $initials = strtoupper($name[0]);

        $svgImage = '<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" xmlns:xlink="http://www.w3.org/1999/xlink">
        <rect width="100%" height="100%" fill="#5850EC" />
        <text x="50" y="54" font-family="Ubuntu, sans-serif" font-size="48" fill="#FFFFFF" text-anchor="middle" alignment-baseline="middle">' . $initials . '</text>
    </svg>';

        $filename = 'initial';
        Storage::disk('public')->put('customer/' . $folder . '/' . $username . '/initials/' . $filename . '.svg', $svgImage);

        return 'customer/' . $folder . '/' . $username . '/initials/' . $filename;
    }


    protected function processAndStoreImage($uploadedImage, $folder, $filename, $isAvatar)
    {
        $initialsPath = $this->generateInitialsImage($folder, $filename);
        if (!$uploadedImage) {
            return $initialsPath;
        }

        $imagePath = $this->createImages($uploadedImage, $folder, $filename, $isAvatar);

        return $imagePath;
    }

    protected function createImages($uploadedImage, $folder, $filename, $isAvatar)
    {
        $imagePath = [];

        foreach (($isAvatar ? $this->avatarSizes : $this->backgroundSizes) as $size) {
            list($width, $height) = explode('x', $size);

            $image = Image::make($uploadedImage)
                ->fit($width, $height)
                ->encode('jpg', 80);

            $imagePath[] = 'customer/' . $folder . '/' . $filename . '/' . $size . '.jpg';
            Storage::disk('public')->put('customer/' . $folder . '/' . $filename . '/' . $size . '.jpg', $image);

            $webpImage = clone $image;
            $webpImage->encode('webp', 80);
            $imagePath[] = 'customer/' . $folder . '/' . $filename . '/' . $size . '.webp';
            Storage::disk('public')->put('customer/' . $folder . '/' . $filename . '/' . $size . '.webp', $webpImage);
        }

        return $imagePath;
    }


    public function render()
    {
        $this->filteredRegions = array_filter($this->regions, function ($region) {
            return stripos($region['name'], $this->typeRegion) !== false && !in_array($region['name'], $this->selectedRegions);
        });

        return view('livewire.customer-form');
    }
}
