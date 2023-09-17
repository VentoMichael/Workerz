<?php

namespace App\Http\Livewire;

use App\Models\PhoneNumber;
use App\Models\Plan;
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
    public $email;
    public $password;
    public $passwordVisible;
    public $streetAddress;
    public $city;
    public $region;
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
        'region' => 'required',
        'postalCode' => 'required|integer',
        'plan' => 'required',
        'phoneNumber1' => 'nullable|numeric|regex:/^\(\d{3}\) \d{3}-\d{4}$/|unique:phone_numbers',
        'phoneNumber2' => 'nullable|numeric|regex:/^\(\d{3}\) \d{3}-\d{4}$/|unique:phone_numbers',
        'phoneNumber3' => 'nullable|numeric|regex:/^\(\d{3}\) \d{3}-\d{4}$/|unique:phone_numbers',
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
        $this->region = $userData['account']['region'] ?? '';
        $this->postalCode = $userData['account']['postalCode'] ?? '';
        $this->plan = $userData['account']['plan'] ?? '';
        $this->skills = Skill::all()->toArray();
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


    public function removePhoneNumber3()
    {
        $this->phoneNumber3 = null;
        $this->showPhoneNumber3 = false;
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

        // Assuming you have a 'skills' table with a 'name' column
        $skills = Skill::whereIn('name', $selectedSkillNames)->get();

        // Attach the skills to the user
        $user->skills()->sync($skills);
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
            'region' => $this->region,
            'postalCode' => $this->postalCode,
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
        $phoneNumbers = [];
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

        $plans = Plan::all();
        return view('livewire.freelancer-form', compact('plans'));
    }
}
