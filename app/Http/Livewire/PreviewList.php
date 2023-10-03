<?php

namespace App\Http\Livewire;

use App\Models\Ad;
use App\Models\Reports;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class PreviewList extends Component
{
    use WithPagination;
    public $selectedAd;
    public $image;
    public $adRegions;
    public $adSkills;
    public $difference;
    public $date;
    public $adRegionsWithCount;
    public $adSkillsWithCount;




    public $showModal = false;
    public $subject = '';
    public $description = '';
    public $title;
    public $isSharingOpen = false;
    public $isReportingOpen = false;
    public $ad_id;
    public $reportSubmitted = false;
    public $clearProperty;
    public $successMessage;
    public $errorMessage;

    protected $rules = [
        'subject' => 'required|not_in:""',
        'description' => 'required|string',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function toggleSharing()
    {
        $this->isSharingOpen = !$this->isSharingOpen;
    }

    public function toggleReporting()
    {
        $this->isReportingOpen = !$this->isReportingOpen;
    }

    public function copyUrl()
    {
        try {
            $this->clearProperty = 'successMessage';
            $this->successMessage = 'Url copied successfully';
        } catch (Exception $e) {
            $this->clearProperty = 'errorMessage';
            $this->errorMessage = 'There is an error, please try again later.';
        }
    }

    public function mount()
    {
        $this->selectedAd = Ad::first();
        $this->subject = '';
    }
    public function submitReport()
    {
            $this->validate();
        try {
            $re = Reports::create([
                'subject' => $this->subject,
                'description' => $this->description,
                'ad_id' => $this->selectedAd->id,
                'user_id' => $this->selectedAd->user->id,
            ]);
            sleep(1);
            $this->isReportingOpen = false;
            $this->resetForm();
            $this->clearProperty = 'successMessage';
            $this->successMessage = 'We will review your report and take appropriate action if necessary. Thank you for your feedback.';
        } catch (Exception $e) {
            $this->resetForm();
            $this->clearProperty = 'errorMessage';
            $this->errorMessage = 'There was an error processing your report. Please try again later.';
        }
    }

    private function resetForm()
    {
        $this->subject = '';
        $this->description = '';
        $this->reportSubmitted = false;
    }

    public function clearMessage($property)
    {
        $this->$property = null;
    }
    public function render()
    {
        $ads = Ad::with('skills', 'region', 'user.company')
            ->orderBy('created_at', 'desc')
            ->paginate(2);

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

        return view('livewire.preview-list', compact('ads')
        );
    }

    public function showPreview($adId)
    {
        $this->selectedAd = Ad::find($adId);

    }

    public function paginationView()
    {
        return 'components/pagination';
    }
}

