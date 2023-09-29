<?php

namespace App\Http\Livewire;

use App\Models\Reports;
use Livewire\Component;

class ReportAd extends Component
{
    public $showModal = false;
    public $subject = '';
    public $description = '';
    public $title ;
    public $ad ;
    public $isSharingOpen = false;
    public $isReportingOpen = false;
    public $ad_id ;
    public $reportSubmitted = false;
    public $clearProperty ;
    public $successMessage ;

    protected $rules = [
        'subject' => 'required|not_in:""',
        'description' => 'required|string',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function mount($ad)
    {
        $this->subject = '';
        $this->ad_id = $ad->id;
        $this->title = $ad->title;
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
        $this->clearProperty = 'successMessage';
        $this->successMessage = 'Url copied successfully';
    }
    public function submitReport()
    {
        $this->validate();
        Reports::create([
            'subject' => $this->subject,
            'description' => $this->description,
            'ad_id' => $this->ad_id,
        ]);
        sleep(1);
        $this->isReportingOpen = false ;
        $this->resetForm();
        $this->clearProperty = 'successMessage';
        $this->successMessage = 'We will review your report and take appropriate action if necessary. Thank you for your feedback.';
    }
    public function clearMessage($property)
    {
        $this->$property = null;
    }
    private function resetForm(){
        $this->subject = '';
        $this->description = '';
    }
    public function render()
    {
        return view('livewire.report-ad');
    }
}
