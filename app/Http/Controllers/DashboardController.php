<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDashboardRequest;
use App\Http\Requests\UpdateDashboardRequest;
use App\Models\Dashboard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Session::flush();
        //mettre un message de bonjour ou rebonjour et bouger avec la session apres 10m
// Set the tutorial_shown column for the authenticated user
        if (request()->has('nevermind')){
            Auth::user()->update(['tutorial_shown' => true]);
        }

        return view('dashboard.home');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function profil()
    {
        return view('dashboard.profil');
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
            return view('dashboard.plans');

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
        if (request()->has('nevermind')){
            Auth::user()->update(['tutorial_shown' => true]);
        }
        if (request()->has('nevermind')){
            Auth::user()->update(['tutorial_shown' => true]);
        }
        if (request()->has('nevermind')){
            Auth::user()->update(['tutorial_shown' => true]);
        }
        //update
            return view('dashboard.settings');
    }


    public function deleteAccount(){
    }
}
