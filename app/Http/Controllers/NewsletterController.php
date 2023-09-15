<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsletterController extends Controller
{

    public function subscribe(Request $request)
    {
        $request->validate([
            'newsletter' => 'required|email',
        ]);

        return redirect()->back()->with('success', 'You are now subscribed to our newsletter!');
    }
}
