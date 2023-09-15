<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UpdatePasswordProfil extends Component
{
    public $currentPassword;
    public $successMessage = '';
    public $successMessagePassword = '';
    public $infoMessage = '';
    public $changesMade = false;
    public $passwordVisible;
    public $newPassword;
    public $newPasswordVisible;

    protected $rules = [
        'currentPassword' => 'required',
        'newPassword' => 'required|min:8',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function togglePasswordVisibility()
    {
        $this->passwordVisible = !$this->passwordVisible;
    }

    public function toggleNewPasswordVisibility()
    {
        $this->newPasswordVisible = !$this->newPasswordVisible;
    }


    public function clearMessage($property)
    {
        $this->$property = null;
    }
    public function updatePassword()
    {
        $user = Auth::user();


        if (isset($this->currentPassword) && !Hash::check($this->currentPassword, $user->password)) {
            $this->addError('currentPassword', 'The current password is incorrecttttttt.');
            return;
        }else{
            $user->password =  Hash::make($this->newPassword);
            $user->save();

            $this->reset(['currentPassword', 'newPassword']);
            $this->successMessage = 'Password updated successfully.';
            $this->clearProperty = 'successMessage';
        }


    }

    public function render()
    {
        return view('livewire.update-password-profil');
    }
}
