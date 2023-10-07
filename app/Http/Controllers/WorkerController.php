<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workers = User::byRoleId(1)->with('company.skills', 'company.regions')->get();
        $userRegions = [];
        $userSkills = [];

        foreach ($workers as $worker) {
            $companySkills = $worker->company->skills->pluck('name', 'id')->toArray();
            $userSkills = array_merge($userSkills, $companySkills);
            $userRegions = $worker->company->regions->pluck('name', 'id')->toArray();
        }
        $userRegionsWithCount = array_count_values($userRegions);
        $userSkillsWithCount = array_count_values($userSkills);
        return view('workers.workers', compact('workers', 'userRegionsWithCount', 'userSkillsWithCount'));

    }

    public function show($worker)
    {

        $worker = User::with('company.skills', 'company.regions', 'phoneNumbers')
            ->whereHas('company', function ($query) use ($worker) {
                $query->where('name', $worker);
            })->first();
        return view('workers.show', compact('worker'));
    }

}
