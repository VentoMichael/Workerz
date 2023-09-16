<?php

namespace App\Http\Livewire;

use App\Models\PhoneNumber;
use App\Models\Plan;
use App\Models\Role;
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
    public $filter = '';
    public $showSkillsList = false;
    public $filteredSkills = [];
    public $selectedSkills = [];
    public $skills = [
'3D Modeling and Animation',
'3D Printing and Prototyping',
'Accounting and Bookkeeping',
'Architecture and Interior Design',
'Augmented Reality (AR) Development',
'Automotive Repair and Maintenance',
'Biotechnology Consulting',
'Branding and Identity',
'Business Plan Writing',
'Business Planning and Consulting',
'Carpentry and Woodworking',
'Cleaning and Housekeeping',
'Content Writing',
'Copywriting',
'Cybersecurity Consulting',
'Data Analysis and Visualization',
'Data Cleaning and Preprocessing',
'Data Entry and Excel Services',
'Data Entry Automation',
'Data Science and Analytics',
'Database Administration',
'Database Development',
'Database Optimization',
'E-commerce Services',
'Email Marketing',
'Environmental Consulting',
'Event Coordination and Planning',
'Event Photography',
'Event Planning and Coordination',
'Fashion Design',
'Financial Consulting',
'Financial Planning',
'Game Design',
'Game Development',
'Graphic Design',
'Health and Medical Consultation',
'Home Appliance Repair',
'Home Improvement and Handyman Services',
'HVAC Services',
'Illustration and Art',
'Information Technology (IT) Support',
'Interior Design',
'Inventory Management',
'IT Support and Troubleshooting',
'Landscaping and Gardening',
'Legal Consulting',
'Legal Document Preparation',
'Legal Services',
'Life Coaching',
'Logo Design',
'Machine Learning',
'Market Analysis',
'Market Research',
'Market Research Analysis',
'Market Trend Analysis',
'Marketing',
'Mobile App Design',
'Mobile App Development',
'Mobile App Maintenance',
'Mobile App Testing',
'Music Composition',
'Natural Language Processing',
'Nutrition and Diet Planning',
'Online Course Creation',
'Pest Control',
'Pet Services and Pet Care',
'Photography',
'Plumbing and Electrical Services',
'Podcast Production',
'Project Management',
'Public Relations',
'Public Speaking Coaching',
'Real Estate Services',
'Research and Development',
'Resume Writing',
'Sales',
'Search Engine Marketing',
'SEO and Digital Marketing',
'Social Media Advertising',
'Social Media Content Creation',
'Social Media Management',
'Social Media Strategy',
'Software Development',
'Sustainability Consulting',
'Tax Preparation',
'Technical Support',
'Time Management',
'Translation and Localization',
'Travel Photography',
'Travel Planning and Booking',
'UI/UX Design',
'Video Editing',
'Video Production',
'Virtual Assistance',
'Virtual Event Management',
'Virtual Reality (VR) Development',
'Voice Acting',
'Voiceover and Audio Services',
'Voiceover Script Writing',
'Web and Mobile Design',
'Web Development',
'Wedding Planning',
'Woodworking',
'Writing and Editing',
'Yoga and Wellness Coaching'
];



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

            $this->filter = '';
            $this->filteredSkills = $this->skills;
        }
    }


    public function removeSkill($index)
    {
        if (isset($this->selectedSkills[$index])) {
            unset($this->selectedSkills[$index]);
            $this->selectedSkills = array_values($this->selectedSkills);
        }
    }
    public function addSkill($skill)
    {
        $skill = trim($skill); // Remove leading and trailing spaces

        if (!empty($skill) && !in_array($skill, $this->selectedSkills)) {
            $this->selectedSkills[] = $skill;
            $this->showSkillsList = false;
            $this->filter = '';
        }
    }
    public function filterSkills()
    {
        $this->filteredSkills = array_filter($this->skills, function ($skill) {
            return stripos($skill, $this->filter) !== false && !in_array($skill, $this->selectedSkills);
        });

        $this->showSkillsList = true; // Show the skills list
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
        $phoneNumbers = [];
        dd($phoneNumbers);
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
        $filteredSkills = array_filter($this->skills, function ($skill) {
            return str_contains(strtolower($skill), strtolower($this->filter));
        });

        $plans = Plan::all();
        return view('livewire.freelancer-form', compact('plans','filteredSkills'));
    }
}
