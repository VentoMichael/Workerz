<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    public function showRoleForm()
    {
        return view('connexion.sign-up.first-step');
    }

    public function storeRole(Request $request)
    {
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
        dd('f');
        $user = session('user', []);

        // Add user account information to the user array
        $user['account'] = $request->all();

        // Store the updated user array in the session
        session(['user' => $user]);

        dd(session('user'));

        // Store user account information (in session or database)
        return redirect()->route('sign-up.confirmation');
    }

    public function showConfirmationForm()
    {
        return view('connexion.sign-up.third-step');
    }

    public function storeConfirmation(Request $request)
    {
        // Store confirmation information (in session or database)
        return redirect()->route('sign-up.payment');
    }

    public function showPaymentForm()
    {
        return view('connexion.sign-up.payment-step');
    }

    public function storePayment(Request $request)
    {
        // Process payment and complete registration
        // Redirect to the user dashboard or appropriate page
    }
}

