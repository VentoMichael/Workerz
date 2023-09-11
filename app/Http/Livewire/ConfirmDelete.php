<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class ConfirmDelete extends ModalComponent
{
    public function confirmDelete()
    {

        sleep(2);
        Auth::user()->delete();

        // Log the user out/Auth::logout();

        // Clear the session
        Session::flush();
        session()->flash('successMessage', 'Account deleted successfully!');
        // Redirect with a success message or wherever you want to go after deletion
        return redirect()->route('home');
    }


    public function clearMessage($property)

    {

        $this->$property = null;

    }

    public function cancelDelete()
    {
        $this->closeModal(); // Close the confirmation modal
    }

    public function render()
    {
        return view('livewire.confirm-delete');
    }
}
