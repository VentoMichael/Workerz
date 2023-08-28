<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Settings extends Component
{
    public $hiring;
    public $private;
    public $clearProperty;
    public $allowCommenting;
    public $successMessage = '';
    public $infoMessage = '';
    public $changesMade = false; // Track changes flag

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
        $this->changesMade = true; // Mark changes made
    }

    public function togglePrivate()
    {
        $this->private = !$this->private;
        $this->changesMade = true; // Mark changes made
    }

    public function toggleAllowCommenting()
    {
        $this->allowCommenting = !$this->allowCommenting;
        $this->changesMade = true; // Mark changes made
    }

    public function submitForm()
    {
        if ($this->changesMade) { // Check if any changes were made
            $user = auth()->user();
            $user->update([
                'private' => $this->private,
                'allow_commenting' => $this->allowCommenting,
                'hiring' => $this->hiring,
            ]);

            // For demonstration purposes, let's simulate a delay
            sleep(1);
            $this->successMessage = 'Settings updated successfully!';
            $this->infoMessage = null;
            $this->clearProperty = 'successMessage';
            $this->changesMade = false; // Reset changes made flag
        } else {
            $this->successMessage = null;
            $this->clearProperty = 'infoMessage';
            $this->infoMessage = 'No changes made to update.';
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
