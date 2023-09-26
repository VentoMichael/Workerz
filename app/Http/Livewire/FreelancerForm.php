<?php

namespace App\Http\Livewire;

use App\Models\PhoneNumber;
use App\Models\Plan;
use App\Models\Region;
use App\Models\Role;
use App\Models\Skill;
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
    public $phoneNumber1;
    public $phoneNumber2;
    public $phoneNumber3;
    public $showPhoneNumber2 = false;
    public $showPhoneNumber3 = false;
    public $backgroundUpload;
    public $firstname;
    public $lastname;
    public $jobTitle;
    public $mainSkill;
    public $email;
    public $password;
    public $passwordVisible;
    public $streetAddress;
    public $city;
    public $postalCode;
    public $plan;
    public $annualBilling = false;
    protected $avatarSizes = ['32x32', '160x160', '128x128'];
    protected $backgroundSizes = ['1980x192', '1280x192', '680x192'];
    public $typeSkill;
    public $showSkillsList = false;
    public $filteredSkills = [];
    public $selectedSkills = [];
    public $skills = [];
    public $maxSkills = 3;

    public $typeRegion;
    public $showRegionsList = false;
    public $filteredRegions = [];
    public $selectedRegions = [];
    public $regions = [];
    public $maxRegions = 2;


    protected $rules = [
        'username' => 'required|unique:users',
        'about' => 'required|min:10',
        'avatarUpload' => 'nullable|image|mimes:jpeg,png,svg,webp|max:1024',
        'backgroundUpload' => 'nullable|image|mimes:jpeg,png,svg,webp|max:1024',
        'firstname' => 'required',
        'lastname' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8',
        'streetAddress' => 'required',
        'city' => 'required',
        'postalCode' => 'required|integer',
        'plan' => 'required',
        'jobTitle' => 'required',
        'mainSkill' => 'required',
        'phoneNumber1' => 'nullable|numeric|unique:phone_numbers,number|phone:BE',
        'phoneNumber2' => 'nullable|numeric|unique:phone_numbers,number|phone:BE',
        'phoneNumber3' => 'nullable|numeric|unique:phone_numbers,number|phone:BE',

    ];

    public function mount()
    {
        $userData = session('user', []);

        $this->username = $userData['account']['username'] ?? '';
        $this->about = $userData['account']['about'] ?? '';
        $this->firstname = $userData['account']['firstname'] ?? '';
        $this->lastname = $userData['account']['lastname'] ?? '';
        $this->email = $userData['account']['email'] ?? '';
        $this->password = $userData['account']['password'] ?? '';
        $this->streetAddress = $userData['account']['streetAddress'] ?? '';
        $this->city = $userData['account']['city'] ?? '';
        $this->postalCode = $userData['account']['postalCode'] ?? '';
        $this->plan = $userData['account']['plan'] ?? '';
        $this->jobTitle = $userData['account']['jobTitle'] ?? '';
        $this->mainSkill = $userData['account']['mainSkill'] ?? '';
        $this->skills = Skill::all()->toArray();
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

    public function removePhoneNumber2()
    {
        $this->phoneNumber2 = null;
        $this->showPhoneNumber2 = false;
    }

    public function toggleSkillsList()
    {
        $this->showSkillsList = !$this->showSkillsList;

        if ($this->showSkillsList) {
            $this->filteredSkills = $this->skills;
        } else {

            $this->typeSkill = '';
            $this->filteredSkills = $this->skills;
        }
    }

    public function removePhoneNumber3()
    {
        $this->phoneNumber3 = null;
        $this->showPhoneNumber3 = false;
    }

    public function removeSkill($skillId)
    {
        if (($key = array_search($skillId, $this->selectedSkills)) !== false) {
            unset($this->selectedSkills[$key]);
        }
        $this->selectedSkills = array_values($this->selectedSkills);
    }

    public function addSkill($skill)
    {

        $skill = trim($skill);

        $selectedSkillsLower = array_map('strtolower', $this->selectedSkills);

        if (
            !empty($skill) &&
            !in_array(strtolower($skill), $selectedSkillsLower) &&
            count($this->selectedSkills) < $this->maxSkills
        ) {
            $this->selectedSkills[] = $skill;
            $this->showSkillsList = false;
            $this->highlightedSkill = null;
            $this->reset('typeSkill');
        }
    }

    public function filterSkills()
    {

        $this->filteredSkills = array_values(array_filter($this->skills, function ($skill) {
            return !in_array(strtolower($skill['name']), array_map('strtolower', $this->selectedSkills))
                && stripos($skill['name'], strtolower($this->typeSkill)) !== false;
        }));
        $this->showSkillsList = true;
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

    public function toggleAnnualBilling()
    {
        $this->annualBilling = !$this->annualBilling;
    }

    public function togglePasswordVisibility()
    {
        $this->passwordVisible = !$this->passwordVisible;
    }

    public function getSelectedSkillNames()
    {
        return collect($this->skills)->filter(function ($skill) {
            return in_array($skill['id'], $this->selectedSkills);
        })->pluck('name');
    }

    public function getSelectedSkillNameId()
    {
        $selectedSkills = collect($this->skills)->filter(function ($skill) {
            return in_array($skill['id'], $this->selectedSkills);
        });

        return $selectedSkills->pluck('name', 'id');
    }

    public function saveSkillsForUser($user)
    {
        $selectedSkillNames = $this->getSelectedSkillNames();

        $skills = Skill::whereIn('name', $selectedSkillNames)->get();

        $user->skills()->sync($skills);
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

    public function saveRegionsForUser($user)
    {
        $selectedRegionNames = $this->getSelectedRegionNames();

        $regions = Region::whereIn('name', $selectedRegionNames)->get();
        $user->regions()->sync($regions);
    }

    public function submitForm()
    {
        $this->validate();
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
        $userData = [
            'username' => $this->username,
            'about' => $this->about,
            'firstname' => ucfirst($this->firstname),
            'lastname' => ucfirst($this->lastname),
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'avatarUpload' => $this->processAndStoreImage($this->avatarUpload, 'avatars', $this->username, true),
            'streetAddress' => $this->streetAddress,
            'city' => $this->city,
            'postalCode' => $this->postalCode,
            'jobTitle' => ucfirst($this->jobTitle),
            'mainSkill' => $this->mainSkill,
        ];
        if ($this->backgroundUpload) {
            $userData['backgroundUpload'] = $this->processAndStoreImage($this->backgroundUpload, 'covers', $this->username, false);
        } else {
            $userData['backgroundUpload'] = ["covers/default_background_320.jpg", "covers/default_background_320.webp", "covers/default_background_680.jpg", "covers/default_background_680.webp", "covers/default_background_1280.jpg", "covers/default_background_1280.webp", "covers/default_background_1980.jpg", "covers/default_background_1980.webp"];
        }
        $user = session('user', []);
        $user['account'] = $userData;
        session(['user' => $user]);
        $newUser = User::create($userData);
        $newUser->role()->associate(Role::find($user['role']));
        $newUser->save();
        $phoneNumbers = [$this->phoneNumber1, $this->phoneNumber2, $this->phoneNumber3,
        ];
        $phoneNumbers = array_filter($phoneNumbers, function ($value) {
            return !is_null($value);
        });
        foreach ($phoneNumbers as $phoneNumber) {
            $newUser->phoneNumbers()->create(['number' => $phoneNumber]);
        }
        $this->saveSkillsForUser($newUser);
        $this->saveRegionsForUser($newUser);
        sleep(1);
        return redirect()->route('sign-up.confirmation');
    }


    public function generateInitialsImage($folder, $username)
    {
        $name = $this->username;
        $initials = strtoupper($name[0]);

        $svgImage = '<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" xmlns:xlink="http://www.w3.org/1999/xlink">
        <rect width="100%" height="100%" fill="#5850EC" />
        <text x="50" y="54" font-family="Ubuntu, sans-serif" font-size="48" fill="#FFFFFF" text-anchor="middle" alignment-baseline="middle">' . $initials . '</text>
    </svg>';

        $filename = 'initial';
        Storage::disk('public')->put($folder . '/' . $username . '/initials/' . $filename . '.svg', $svgImage);

        return $folder . '/' . $username . '/initials/' . $filename;
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

            $imagePath[] = $folder . '/' . $filename . '/' . $size . '.jpg';
            Storage::disk('public')->put($folder . '/' . $filename . '/' . $size . '.jpg', $image);

            $webpImage = clone $image;
            $webpImage->encode('webp', 80);
            $imagePath[] = $folder . '/' . $filename . '/' . $size . '.webp';
            Storage::disk('public')->put($folder . '/' . $filename . '/' . $size . '.webp', $webpImage);
        }

        return $imagePath;
    }


    public function render()
    {
        $this->filteredSkills = array_filter($this->skills, function ($skill) {
            return stripos($skill['name'], $this->typeSkill) !== false && !in_array($skill['name'], $this->selectedSkills);
        });

        $this->filteredRegions = array_filter($this->regions, function ($region) {
            return stripos($region['name'], $this->typeRegion) !== false && !in_array($region['name'], $this->selectedRegions);
        });

        $plans = Plan::all();
        return view('livewire.freelancer-form', compact('plans'));
    }
}
