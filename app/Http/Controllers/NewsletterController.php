<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        // Validate the email address (add validation rules as needed)
        $request->validate([
            'newsletter' => 'required|email',
        ]);

        // Subscribe the user to the newsletter (you can implement this logic here)
        // You can use a mailing service or save the email to your newsletter list

        // Redirect back with a success message or return a JSON response
        return redirect()->back()->with('success', 'You are now subscribed to our newsletter!');
    }
}
