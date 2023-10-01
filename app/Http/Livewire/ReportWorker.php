<?php

namespace App\Http\Livewire;

use App\Models\Reports;
use Exception;
use Livewire\Component;

class ReportWorker extends Component
{
    public $showModal = false;
    public $subject = '';
    public $description = '';
    public $name ;
    public $ad ;
    public $isSharingOpen = false;
    public $isReportingOpen = false;
    public $user ;
    public $reportSubmitted = false;
    public $clearProperty ;
    public $successMessage ;
    public $errorMessage ;

    protected $rules = [
        'subject' => 'required|not_in:""',
        'description' => 'required|string',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function mount($worker)
    {
        $this->subject = '';

        $this->user = $worker->id;
        $this->name = $worker->company->name;
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
    public function copyUrl(){
        try {
        $this->clearProperty = 'successMessage';
        $this->successMessage = 'Url copied successfully';
        }catch(Exception $e){
            $this->clearProperty = 'errorMessage';
            $this->errorMessage = 'There is an error, please try again later.';
        }
    }
    public function submitReport()
    {
            $this->validate();
        try {
            $this->successMessage = null;
            Reports::create([
                'subject' => $this->subject,
                'description' => $this->description,
                'user_id' => $this->user,
            ]);
            sleep(1);
            $this->isReportingOpen = false;
            $this->resetForm();
            $this->clearProperty = 'successMessage';
            $this->successMessage = 'We will review your report and take appropriate action if necessary. Thank you for your feedback.';
        }catch(Exception $e){
            $this->resetForm();
            $this->clearProperty = 'errorMessage';
            $this->errorMessage = 'There is an error, please try again later.';
        }
    }
    public function clearMessage($property)
    {
        $this->$property = null;
    }
    private function resetForm(){
        $this->subject = '';
        $this->description = '';
        $this->reportSubmitted = false;
    }
    public function render()
    {
        return view('livewire.report-worker');
    }
}
