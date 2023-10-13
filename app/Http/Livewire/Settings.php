<?php

namespace App\Http\Livewire;

use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Settings extends Component
{
    public $hiring;
    public $private;
    public $clearProperty;
    public $saveLoading = false;
    public $allowCommenting;
    public $successMessage = '';
    public $errorMessage = '';
    public $successMessagePassword = '';
    public $infoMessage = '';
    public $changesMade = false;
    protected $listeners = ['confirmedDeletion' => 'deleteAccount'];
    public $deleteActivation = false;

    public function mount()
    {
        $user = auth()->user();
        $this->private = $user->private;
        $this->allowCommenting = $user->allow_commenting;
        $this->hiring = $user->hiring;
    }

    public function toggleHiring()
    {
        $this->hiring = !$this->hiring;
        $this->changesMade = true;
    }

    public function togglePrivate()
    {
        $this->private = !$this->private;
        $this->changesMade = true;
    }

    public function toggleAllowCommenting()
    {
        $this->allowCommenting = !$this->allowCommenting;
        $this->changesMade = true;
    }

    public function deleteBtn()
    {
        $this->deleteActivation = true;
    }

    public function submitForm()
    {
        try {
            if ($this->changesMade) {
                $this->saveLoading = true;
                $user = auth()->user();
                $user->update([
                    'private' => $this->private,
                    'allow_commenting' => $this->allowCommenting,
                    'hiring' => $this->hiring,
                ]);

                sleep(1.5);

                $this->successMessage = 'Settings updated successfully!';
                $this->infoMessage = null;
                $this->clearProperty = 'successMessage';
                $this->changesMade = false;
            } else if (!$this->deleteActivation) {
                $this->successMessage = null;
                $this->clearProperty = 'infoMessage';
                $this->infoMessage = 'No changes made to update.';
            }
            $this->changesMade = false;
        } catch (Exception $e) {
            $this->clearProperty = 'errorMessage';
            $this->errorMessage = 'There is an error, please try again later.';
        }
    }


    public function clearMessage($property)
    {
        $this->$property = null;
    }


    public function render()
    {
        return view('livewire.settings');
    }
}
