<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function showSubscriptionForm()
    {
        return view('sign-up.confirmation');
    }
    public function subscribe(Request $request)
    {
        return redirect()->route('dashboard')->with('success', 'Subscription successful.');
    }
}
