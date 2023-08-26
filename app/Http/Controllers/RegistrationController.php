<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Stripe\Stripe;

class RegistrationController extends Controller
{
    public function showRoleForm()
    {
        return view('connexion.sign-up.first-step');
    }

    public function storeRole(Request $request)
    {
        Validator::make($request->all(), [
            'role' => 'required',
        ])->validate();
        $user = [
            'role' => $request->input('role')
        ];

        // Store the user array in the session
        session(['user' => $user]);
        // Store user role information (in session or database)
        return redirect()->route('sign-up.account');
    }

    public function showAccountForm()
    {
        return view('connexion.sign-up.second-step');
    }

    public function storeAccount(Request $request)
    {
    }

    public function showConfirmationForm()
    {
        return view('connexion.sign-up.third-step');
    }

    public function storeConfirmation(Request $request)
    {
        return redirect()->route('sign-up.payment');
    }
}

