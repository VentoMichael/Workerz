<?php

namespace App\Http\Livewire;

use App\Models\Newsletter;
use Exception;
use Livewire\Component;

class NewsletterSubscription extends Component
{
    public $email;
    public $successMessage;
    public $clearProperty;
    public $errorMessage ;

    protected $rules = [
        'email' => 'required|email|unique:newsletters',
    ];

    protected $messages = [
        'email.required' => 'The email address cannot be empty.',
        'email.email' => 'The email address format is not valid.',
        'email.unique' => 'The email address is already registered.',
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
        try {
        $this->validate();

        Newsletter::create([
            'email' => $this->email,
            'subscribed' => true,
        ]);
        sleep(1);
        $this->email = '';
        $this->clearProperty = 'successMessage';
        $this->successMessage = 'You have successfully subscribed to our newsletter!';
        }catch(Exception $e){
            $this->clearProperty = 'errorMessage';
            $this->successMessage = $e->getMessage();
        }
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
