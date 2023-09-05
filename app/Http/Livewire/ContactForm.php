<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class ContactForm extends Component
{
    public $email_contact;
    public $subject;
    public $message;
    public $successMessage;
    public $clearProperty;

    protected $rules = [
        'email_contact' => 'required|email',
        'subject' => 'required|max:256',
        'message' => 'required|min:5',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName,);
    }
    public function mount()
    {
        $this->email_contact = Auth::user()->email ?? '';
        $subjectFromQuery = Request::query('subject');
        if ($subjectFromQuery) {
            $this->subject = $subjectFromQuery;
        }
    }
    public function submitForm(){

        $this->validate();

        Contact::create([
            'email' => $this->email_contact,
            'subject' => $this->subject,
            'message' => $this->message,
        ]);
        sleep(1);
        $this->resetForm();
        $this->clearProperty = 'successMessage';
        $this->successMessage = 'We received your message successfully and will get back to you shortly!';
    }
    public function clearMessage($property)
    {
        $this->$property = null;
    }
    private function resetForm(){
        $this->email_contact = '';
        $this->subject = '';
        $this->message = '';
    }
    public function render()
    {
        return view('livewire.contact-form');
    }
}
