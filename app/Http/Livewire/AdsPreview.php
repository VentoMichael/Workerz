<?php

namespace App\Http\Livewire;

use App\Models\Ad;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination; // Import the WithPagination trait

class AdsPreview extends Component
{
    use WithPagination; // Use the WithPagination trait
    public $image;
    public $adRegions;
    public $adSkills;
    public $difference;
    public $date;
    public $adRegionsWithCount;
    public $adSkillsWithCount;

    public function render()
    {
        // Fetch ads with skills, regions, and user companies and paginate them
        $ads = Ad::with('skills', 'region', 'user.company')
            ->orderBy('created_at', 'desc')
            ->paginate(2); // Adjust the number of items per page as needed

        $this->adRegions = [];
        $this->adSkills = [];

        foreach ($ads as $ad) {
            $this->adRegions[] = $ad->region->name;
            $this->adSkills = array_merge($this->adSkills, $ad->skills->pluck('name', 'id')->toArray());
            $this->difference = now()->diffInMinutes($ad->posted_at);

            if ($this->difference < 60) {
                $ad->formattedCreatedAt = $this->difference . ' ' . Str::plural('minute', $this->difference);
            } elseif ($this->difference < 1440) {
                $ad->formattedCreatedAt = floor($this->difference / 60) . ' ' . Str::plural('hour', floor($this->difference / 60));
            } elseif ($this->difference < 43200) {
                $ad->formattedCreatedAt = now()->diffInDays($ad->posted_at) . ' ' . Str::plural('day', now()->diffInDays($ad->posted_at));
            } else {
                $ad->formattedCreatedAt = '30+ days';
            }
            $date = Carbon::parse($ad->start_date);
            $ad->formattedStartedAt = $date->isoFormat('DD MMMM YY');
            if ($ad->user->hasRole(1)) {
                $this->image = $ad->user->company->logoUpload;
            } else {
                $this->image = $ad->user->avatarUpload;
            }
        }
        $this->adRegionsWithCount = array_count_values($this->adRegions);
        $this->adSkillsWithCount = array_count_values($this->adSkills);

        // Pass the paginated ads data to the view
        return view('livewire.ads-preview', compact('ads'));
    }
}
