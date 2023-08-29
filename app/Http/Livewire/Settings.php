<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Settings extends Component
{
    public $hiring;
    public $private;
    public $clearProperty;
    public $allowCommenting;
    public $successMessage = '';
    public $successMessagePassword = '';
    public $showDeleteModal = false;
    public $infoMessage = '';
    public $changesMade = false; // Track changes flag


    public $currentPassword;
    public $newPassword;

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
        if ($this->showDeleteModal === true){
            $this->confirmDelete();
        }
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
    public function confirmDelete()
    {
        auth()->user()->delete();
        Session::flush();
        // Log the user out
        Auth::logout();
        sleep(2);

        // Redirect with success message
        return redirect()->route('home');
    }


    public function updatePassword()
    {
        $this->validate([
            'currentPassword' => ['required', function ($attribute, $value, $fail) {
                if (!Hash::check($value, Auth::user()->password)) {
                    $fail('The current password is incorrect.');
                }
            }],
            'newPassword' => ['required', 'string', 'min:8'],
        ]);
        Auth::user()->update([
            'password' => Hash::make($this->newPassword),
        ]);

        $this->currentPassword = '';
        $this->newPassword = '';

        session()->flash('success', 'Password updated successfully!');
    }
    public function closeDeleteModal()
    {
        $this->showDeleteModal = false;
    }
    public function render()
    {
        return view('livewire.settings');
    }
}
