<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDashboardRequest;
use App\Http\Requests\UpdateDashboardRequest;
use App\Models\Dashboard;
use App\Models\Plan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        //Session::flush();
        //mettre un message de bonjour ou rebonjour et bouger avec la session apres 10m
// Set the tutorial_shown column for the authenticated user
        if (request()->has('nevermind')) {
            $user->update(['tutorial_shown' => true]);
        }

        return view('dashboard.home', compact('user'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function profil()
    {
        $user = Auth::user();

        return view('dashboard.profil', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function messages()
    {
        return view('dashboard.messages');
    }

    /**
     * Display the specified resource.
     */
    public function plans()
    {
        $user = Auth::user();
        $plans = Plan::all();
        $stripePlanNames = [];
        $matchedPlan = null;
        foreach ($plans as $plan) {
            $stripePlanNames[] = $plan->name;
        }

        foreach ($stripePlanNames as $planName) {
            $subscription = $user->subscription($planName);
            if ($subscription) {
                $matchedPlan = $planName;
                break;
            }
        }
        $interval = $subscription->asStripeSubscription()->plan->interval === 'month' ? 'Month' : 'Annual';
        $lastDay = Carbon::createFromTimestamp($subscription->asStripeSubscription()->current_period_end)->format('d-m-Y');
        $invoices = $user->invoices();
        return view('dashboard.plans', compact('matchedPlan','invoices','interval','lastDay','plans','subscription'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function settings()
    {

        return view('dashboard.settings');

    }

    /**
     * Update the specified resource in storage.
     */
    public function updateSettings()
    {
        if (request()->has('nevermind')) {
            Auth::user()->update(['tutorial_shown' => true]);
        }
        //update
        return view('dashboard.settings');
    }

    public function updatePassword()
    {
        dd('f');
    }


    public function deleteAccount()
    {
    }
}
