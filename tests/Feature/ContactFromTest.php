<?php

namespace Tests\Feature;

use App\Http\Livewire\ContactForm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Livewire\Livewire;
use Tests\TestCase;

class ContactFromTest extends TestCase
{
    /** @test */
    function contact_page_contains_contact_form_livewire_component()
    {
        $this->get('/contact-us')
            ->assertSeeLivewire('contact-form');
    }
    /** @test */
    function contact_form_sends_out_an_email()
    {
        Livewire::test(ContactForm::class)
        ->set('email_contact', 'test@example.com')
        ->set('subject', 'Subject')
        ->set('message', 'This is a message')
        ->call('submitForm')
        ->assertSee('We received your message successfully and will get back to you shortly!');
    }
    /** @test */
    function contact_form_email_is_required()
    {
        Livewire::test(ContactForm::class)
        ->set('subject', 'Subject')
        ->set('message', 'This is a message')
        ->call('submitForm')
        ->assertHasErrors(['email_contact' => 'required']);
    }


}
