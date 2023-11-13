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
        $ads = Ad::with('skills','region','user.company')->orderBy('created_at', 'desc')->paginate(2);
        $adRegions = [];
        $adSkills = [];
        $image=null;
        $adsCount=Ad::with('skills','region','user.company')->get();
        foreach ($adsCount as $ad) {
            $adRegions[] = $ad->region->name;
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
            if ($ad->user->hasRole(1)){
                $image = $ad->user->company->logoUpload;
            }else{
                $image = $ad->user->avatarUpload;
            }
        }

        $adRegionsWithCount = array_count_values($adRegions);
        $adSkillsWithCount = array_count_values($adSkills);
        return view('ads.ads',compact('ads','adsCount','image','adRegionsWithCount','adSkillsWithCount'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Ad $ad)
    {
        return view('ads.show');
    }
}
