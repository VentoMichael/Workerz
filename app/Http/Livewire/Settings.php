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
    public $saveLoading = false;
    public $allowCommenting;
    public $successMessage = '';
    public $successMessagePassword = '';
    public $infoMessage = '';
    public $changesMade = false;
    protected $listeners = ['confirmedDeletion' => 'deleteAccount'];
    public $deleteActivation =false;
    public $currentPassword;
    public $passwordVisible;
    public $newPassword;
    public $newPasswordVisible;

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
        } else {
            if(!$this->deleteActivation) {
                $this->successMessage = null;
                $this->clearProperty = 'infoMessage';
                $this->infoMessage = 'No changes made to update.';
            }
        }
    }


    public function clearMessage($property)
    {
        $this->$property = null;
    }

    public function togglePasswordVisibility()
    {
        $this->passwordVisible = !$this->passwordVisible;
    }
    public function toggleNewPasswordVisibility()
    {
        $this->newPasswordVisible = !$this->newPasswordVisible;
    }

    public function updatePassword()
    {
        $user = Auth::user();
        if (!Hash::check($this->currentPassword, $user->password)) {
            $this->addError('currentPassword', 'The current password is incorrect.');
            return;
        }

        $user->update([
            'password' => Hash::make($this->newPassword),
        ]);

        $this->reset(['currentPassword', 'newPassword']);

        session()->flash('successMessagePassword', 'Password updated successfully.');
    }


    public function render()
    {
        return view('livewire.settings');
    }
}
