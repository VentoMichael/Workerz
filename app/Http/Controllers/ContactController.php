<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('contact-us');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {

    }

}
