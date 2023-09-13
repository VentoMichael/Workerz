<?php

namespace App\Http\Livewire;

use App\Models\Newsletter;
use Livewire\Component;

class NewsletterSubscription extends Component
{
    public $email;
    public $successMessage;
    public $clearProperty;
    protected $rules = [
        'email' => 'required|email|unique:newsletters',
    ];
    public function mount()
    {
        $this->email = '';
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function subscribe()
    {
        $this->validate();

        Newsletter::create([
            'email' => $this->email,
            'subscribed' => true,
        ]);
        sleep(1);
        $this->email = '';
        $this->clearProperty = 'successMessage';
        $this->successMessage = 'You have successfully subscribed to our newsletter!';
    }

    public function clearMessage($property)
    {
        $this->$property = null;
    }
    public function render()
    {
        return view('livewire.newsletter-subscription');
    }
}
