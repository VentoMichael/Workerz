<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdRequest;
use App\Http\Requests\UpdateAdRequest;
use App\Models\Ad;
use Carbon\Carbon;
use Illuminate\Support\Str;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ads = Ad::with('skills','region','user')->get();
        $adRegions = [];
        $adSkills = [];

        foreach ($ads as $ad) {
            $adRegions = array_merge($adRegions, $ad->region->pluck('name','id')->toArray());
            $adSkills = array_merge($adSkills, $ad->skills->pluck('name','id')->toArray());
            $difference = now()->diffInMinutes($ad->posted_at);

            if ($difference < 60) {
                $ad->formattedCreatedAt = $difference . ' ' . Str::plural('minute', $difference);
            } elseif ($difference < 1440) {
                $ad->formattedCreatedAt = floor($difference / 60) . ' ' . Str::plural('hour', floor($difference / 60));
            } elseif ($difference < 43200) {
                $ad->formattedCreatedAt = now()->diffInDays($ad->posted_at) . ' ' . Str::plural('day', now()->diffInDays($ad->posted_at));
            } else {
                $ad->formattedCreatedAt = '30+ days';
            }
            $date = Carbon::parse($ad->start_date);
            $ad->formattedStartedAt = $date->isoFormat('DD MMMM YY');
        }
        $adRegionsWithCount = array_count_values($adRegions);
        $adSkillsWithCount = array_count_values($adSkills);
        return view('ads.ads',compact('ads','adRegionsWithCount','adSkillsWithCount'));
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
    public function store(StoreAdRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Ad $ad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ad $ad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdRequest $request, Ad $ad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ad $ad)
    {
        //
    }
}
