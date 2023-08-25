<?php

namespace App\Http\Livewire;

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
    public $streetAddress;
    public $city;
    public $region;
    public $postalCode;
    public $pricingPlan;

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
        'postalCode' => 'required',
        'pricingPlan' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm(){
        $signUp['username'] = $this->username;
        $signUp['about'] = $this->about;
        $signUp['avatarUpload'] = $this->avatarUpload;
        $signUp['backgroundUpload'] = $this->backgroundUpload;
        $signUp['firstname'] = $this->firstname;
        $signUp['lastname'] = $this->lastname;
        $signUp['email'] = $this->email;
        $signUp['password'] = $this->password;
        $signUp['streetAddress'] = $this->streetAddress;
        $signUp['city'] = $this->city;
        $signUp['region'] = $this->region;
        $signUp['postalCode'] = $this->postalCode;
        $signUp['pricingPlan'] = $this->pricingPlan;

        $this->validate();
        $user = session('user', []);
// Add user account information to the user array
        $user['account'] = request()->all();

        // Store the updated user array in the session
        session(['user' => $user]);
        sleep(1);
    }
    public function render()
    {
        return view('livewire.freelancer-form');
    }
}
