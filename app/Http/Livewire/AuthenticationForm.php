<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AuthenticationForm extends Component
{
    public $email;
    public $password;
    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:8',
    ];
    public function render()
    {
        return view('livewire.authentication-form');
    }


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function submitForm()
    {
        $signIn['email'] = $this->email;
        $signIn['password'] = $this->password;
        return route('login');
    }
}
