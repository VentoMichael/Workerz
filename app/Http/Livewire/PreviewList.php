<?php

namespace App\Http\Livewire;

use App\Models\Ad;
use App\Models\Reports;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Str;
use Jenssegers\Agent\Agent;
use Livewire\Component;
use Livewire\WithPagination;

class PreviewList extends Component
{
    use WithPagination;

    public $selectedAd;
    public $image;
    public $sortingOption = 'newest';

    public $selectedCategories = [];
    public $selectedRegions = [];
    public $adRegions;
    public $adSkills;
    public $notHome;
    public $difference;
    public $date;
    public $adRegionsWithCount;

    public $adSkillsWithCount;
    public $sortingOrder = 'posted_at';


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
    public $selectedCategoryCount;
    public $selectedRegionCount;

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
        $agent = new Agent();
        if ($agent->isDesktop()) {
            $this->selectedAd = Ad::with(['skills', 'region', 'user.company'])
                ->when($this->selectedCategories, function ($query) {
                    $query->whereHas('skills', function ($subQuery) {
                        $subQuery->whereIn('name', $this->selectedCategories);
                    });
                })
                ->when($this->selectedRegions, function ($query) {
                    $query->whereHas('region', function ($subQuery) {
                        $subQuery->whereIn('name', $this->selectedRegions);
                    });
                })
                ->orderBy($this->sortingOption === 'cheaper' ? 'budget' : 'posted_at', $this->sortingOption === 'cheaper' ? 'asc' : 'desc')
                ->get()
            ->first();
            $this->initializeSelectedAdProperties();
        }
        $this->subject = '';
    }

    public function updatedPage($page)
    {
        $agent = new Agent();
        if ($agent->isDesktop()) {
            $adsPerPage = 11;
            $offset = ($page - 1) * $adsPerPage;
            $this->selectedAd = Ad::orderBy($this->sortingOption === 'cheaper' ? 'budget' : 'posted_at', $this->sortingOption === 'cheaper' ? 'asc' : 'desc')
                ->skip($offset)
                ->take(1)
                ->get()
                ->first();
        }
    }

    public function submitReport()
    {
        $this->validate();
        try {
            Reports::create([
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

    public function updFilters($sortingOption = null)
    {
        $agent = new Agent();

        $adsQuery = Ad::with(['skills', 'region', 'user.company'])
            ->when(!empty($this->selectedCategories), function ($query) {
                $query->whereHas('skills', function ($subQuery) {
                    $subQuery->whereIn('name', $this->selectedCategories);
                });
            })
            ->when(!empty($this->selectedRegions), function ($query) {
                $query->whereHas('region', function ($subQuery) {
                    $subQuery->whereIn('name', $this->selectedRegions);
                });
            });

        $this->resetPage();


        if ($sortingOption !== null) {
            $this->sortingOption = $sortingOption;
            $this->sortingOrder = $sortingOption;

        }

        if ($this->sortingOrder === 'cheaper') {
            $adsQuery->orderBy('budget', 'asc');
        } else {
            $adsQuery->orderBy('posted_at', 'desc');
        }

        $ads = $adsQuery->paginate(11);

        if ($ads->isEmpty()) {
            return null;
        }


        if ($agent->isDesktop()) {
            $this->selectedAd = $ads->first();
        }

        $this->selectedCategoryCount = count($this->selectedCategories);
        $this->selectedRegionCount = count($this->selectedRegions);


        return $ads;
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

    public function closeAd()
    {
        $this->selectedAd = false;
    }

    public function render()
    {
        $ads = Ad::with(['skills', 'region', 'user.company'])
            ->when($this->selectedCategories, function ($query) {
                $query->whereHas('skills', function ($subQuery) {
                    $subQuery->whereIn('name', $this->selectedCategories);
                });
            })
            ->when($this->selectedRegions, function ($query) {
                $query->whereHas('region', function ($subQuery) {
                    $subQuery->whereIn('name', $this->selectedRegions);
                });
            })
            ->orderBy($this->sortingOption === 'cheaper' ? 'budget' : 'posted_at', $this->sortingOption === 'cheaper' ? 'asc' : 'desc')
            ->paginate(11);
        $allAds = Ad::with('skills', 'region', 'user.company')
            ->get();
        $countAds = Ad::count();
        $this->adRegions = [];
        $this->adSkills = [];

        foreach ($allAds as $allAd) {
            $this->adRegions[] = $allAd->region->name;
            $this->adSkills = array_merge($this->adSkills, $allAd->skills->pluck('name', 'id')->toArray());
        }

        foreach ($ads as $ad) {
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
        $this->selectedCategoryCount = count($this->selectedCategories);
        $this->selectedRegionCount = count($this->selectedRegions);
        $agent = new Agent();
        if ($agent->isDesktop()) {
            $this->initializeSelectedAdProperties();
        }
        return view('livewire.preview-list', compact('ads', 'agent', 'countAds')
        );
    }

    public function showPreview($adId)
    {
        $this->selectedAd = Ad::find($adId);
        $this->initializeSelectedAdProperties();
    }

    private function initializeSelectedAdProperties()
    {
        $this->difference = now()->diffInMinutes($this->selectedAd->posted_at);
        if ($this->difference < 60) {
            $this->selectedAd->formattedCreatedAt = $this->difference . ' ' . Str::plural('minute', $this->difference);
        } elseif ($this->difference < 1440) {
            $this->selectedAd->formattedCreatedAt = floor($this->difference / 60) . ' ' . Str::plural('hour', floor($this->difference / 60));
        } elseif ($this->difference < 43200) {
            $this->selectedAd->formattedCreatedAt = now()->diffInDays($this->selectedAd->posted_at) . ' ' . Str::plural('day', now()->diffInDays($this->selectedAd->posted_at));
        } else {
            $this->selectedAd->formattedCreatedAt = '30+ days';
        }

        $date = Carbon::parse($this->selectedAd->start_date);
        $this->selectedAd->formattedStartedAt = $date->isoFormat('DD MMMM YY');
    }

    public function paginationView()
    {
        return 'components/pagination';
    }
}

