<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorkerRequest;
use App\Http\Requests\UpdateWorkerRequest;
use App\Models\User;
use App\Models\Worker;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workers = User::byRoleId(1)->with('skill','regions')->get();
        $userRegions = [];
        $userSkills = [];

        foreach ($workers as $worker) {
            $userRegions = array_merge($userRegions, $worker->regions->pluck('name','id')->toArray());
            $userSkills = array_merge($userSkills, $worker->skills->pluck('name','id')->toArray());
        }
        $userRegionsWithCount = array_count_values($userRegions);
        $userSkillsWithCount = array_count_values($userSkills);
        return view('workers.workers',compact('workers','userRegionsWithCount','userSkillsWithCount'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWorkerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Worker $worker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Worker $worker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWorkerRequest $request, Worker $worker)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Worker $worker)
    {
        //
    }
}
