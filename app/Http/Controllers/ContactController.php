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
            'email-contact' => 'required|email',
            'subject' => 'required|max:256',
            'message' => 'required|max:256',
        ]);

    }

}
