<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->validate([
            'newsletter' => 'required|email',
        ]);

        return redirect()->back()->with('success', 'You are now subscribed to our newsletter!');
    }
}
