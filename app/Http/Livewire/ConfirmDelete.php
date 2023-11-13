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


        Session::flush();
        session()->flash('successMessage', 'Account deleted successfully!');
        return redirect()->route('home.index');
    }


    public function clearMessage($property)

    {

        $this->$property = null;

    }

    public function cancelDelete()
    {
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.confirm-delete');
    }
}
