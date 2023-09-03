<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        if ($request->has('changePlan')){
            session(['changePlan' => true]);
            return redirect()->route('sign-up.account');
        }
        $user = User::where('email',session('user')['account']['email'])->first();
        $productSelected = session('productSelected')['product'];
        $planPayment = session('productSelected')['paymentYearly'] ? $productSelected['price_yearly'] : $productSelected['price_monthly'];
        $planId = session('productSelected')['paymentYearly'] ? $productSelected['stripe_plan_yearly'] : $productSelected['stripe_plan_monthly'];
        $paymentMethod = $request->input('payment_method');
        $user->createOrGetStripeCustomer();
        $user->addPaymentMethod($paymentMethod);
        try
        {
            $user->charge($planPayment*100, $paymentMethod);
            $user->newSubscription(
                $productSelected['name'], $planId
            )->create($paymentMethod);

        }
        catch (\Exception $e)
        {
            return back()->withErrors(['message' => 'Error creating subscription. ' . $e->getMessage()]);
        }
        return redirect('home');
    }
}

