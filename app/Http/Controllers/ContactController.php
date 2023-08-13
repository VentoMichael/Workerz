<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        request()->validate([
            'email-contact' => 'email',
            'subject' => 'max:256',
            'message' => 'max:256',
        ]);
        //return Redirect::to(URL::previous() . "#createMsg")->with('success', 'Votre message a été envoyé avec succès.
        //Nous vous contacterons bientôt !');
        return request('email-contact');
    }

}
