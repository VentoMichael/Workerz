<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Reports;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Jenssegers\Agent\Agent;
use Livewire\Component;
use Livewire\WithPagination;

class PreviewListWorkers extends Component
{

    use WithPagination;

    public $image;
    public $sortingOption = 'newest';

    public $selectedCategories = [];
    public $selectedRegions = [];
    public $userRegions;
    public $userSkills;
    public $notHome;
    public $difference;
    public $date;
    public $userRegionsWithCount;
    public $userSkillsWithCount;
    public $sortingOrder = 'created_at';


    public $showModal = false;
    public $subject = '';
    public $description = '';
    public $title;
    public $isSharingOpen = false;
    public $isReportingOpen = false;
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

    public function mount()
    {
        $this->subject = '';
    }

    public function submitReport($userId)
    {
        $this->validate();

        try {
            Reports::create([
                'subject' => $this->subject,
                'description' => $this->description,
                'user_id' => $userId,
            ]);

            sleep(1);
            $this->isReportingOpen = false;
            $this->resetForm();
            $this->clearProperty = 'successMessage';
            $this->successMessage = 'We will review your report and take appropriate action if necessary. Thank you for your feedback.';
        } catch (Exception $e) {
            $this->resetForm();
            $this->clearProperty = 'errorMessage';
            $this->errorMessage = $e->getMessage();
        }
    }

    public function updFilters($sortingOption = null)
    {
        $usersQuery = User::byRoleId(1)->whereHas('subscriptions', function ($query) {
            $query->where('stripe_status', 'active');
        })->with('company.skills', 'company.regions')
            ->when(!empty($this->selectedCategories), function ($query) {
                $query->whereHas('company.skills', function ($subQuery) {
                    $subQuery->whereIn('name', $this->selectedCategories);
                });
            })->when(!empty($this->selectedRegions), function ($query) {
                $query->whereHas('company.regions', function ($subQuery) {
                    $subQuery->whereIn('name', $this->selectedRegions);
                });
            });

        $this->resetPage();

        if ($sortingOption !== null) {
            $this->sortingOption = $sortingOption;
            $this->sortingOrder = $sortingOption;

        }

        if ($this->sortingOrder === 'popular') {
            $usersQuery->select('users.*', DB::raw('AVG(comments.rating) as avg_rating'))
                ->leftJoin('companies', 'users.id', '=', 'companies.user_id')
                ->leftJoin('comments', 'companies.id', '=', 'comments.company_id')
                ->groupBy('users.id')
                ->orderBy('avg_rating', 'desc');
        } else {
            $usersQuery->orderBy('created_at', 'desc');
        }

        $users = $usersQuery->paginate(11);

        if ($users->isEmpty()) {
            return null;
        }
        $this->selectedCategoryCount = count($this->selectedCategories);
        $this->selectedRegionCount = count($this->selectedRegions);


        return $users;
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
        $query = User::byRoleId(1)
            ->with('company.skills', 'company.regions')
            ->whereHas('subscriptions', function ($query) {
                $query->where('stripe_status', 'active');
            })
            ->when(!empty($this->selectedCategories), function ($query) {
                $query->whereHas('company.skills', function ($subQuery) {
                    $subQuery->whereIn('name', $this->selectedCategories);
                });
            })
            ->when(!empty($this->selectedRegions), function ($query) {
                $query->whereHas('company.regions', function ($subQuery) {
                    $subQuery->whereIn('name', $this->selectedRegions);
                });
            });
$orderBySubscription = "
        CASE
            WHEN (select name from subscriptions where user_id = users.id and stripe_status = 'active') = 'Business' THEN 1
            WHEN (select name from subscriptions where user_id = users.id and stripe_status = 'active') = 'Premium' THEN 2
            WHEN (select name from subscriptions where user_id = users.id and stripe_status = 'active') = 'Starter' THEN 3
            ELSE 3
        END
    ";
        if ($this->sortingOrder === 'popular') {
            $query->select('users.*', DB::raw('AVG(comments.rating) as avg_rating'))
                ->leftJoin('companies', 'users.id', '=', 'companies.user_id')
                ->leftJoin('comments', 'companies.id', '=', 'comments.company_id')
                ->groupBy('users.id')
                ->orderBy('avg_rating', 'desc')
                ->orderByRaw($orderBySubscription);
        } else {
            $query->orderByRaw($orderBySubscription)->orderBy('created_at', 'desc');
        }

        $users = $query->paginate(11);

        $allUsers = User::with('company.skills', 'company.regions')->get();
        $countUsers = User::count();

        $this->userRegions = [];
        $this->userSkills = [];

        foreach ($allUsers as $allUser) {
            $this->userRegions = array_merge($this->userRegions, $allUser->company->regions->pluck('name', 'id')->toArray());
            $this->userSkills = array_merge($this->userSkills, $allUser->company->skills->pluck('name', 'id')->toArray());
        }

        foreach ($users as $user) {
            if ($user->hasRole(1)) {
                $this->image = $user->company->logoUpload;
            } else {
                $this->image = $user->avatarUpload;
            }
        }

        $this->userRegionsWithCount = array_count_values($this->userRegions);
        $this->userSkillsWithCount = array_count_values($this->userSkills);
        $this->selectedCategoryCount = count($this->selectedCategories);
        $this->selectedRegionCount = count($this->selectedRegions);
        $agent = new Agent();

        return view('livewire.preview-list-workers', compact('users', 'agent', 'countUsers'));

    }

    public function paginationView()
    {
        return 'components/pagination';
    }
}
