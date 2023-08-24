<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SearchJobDropdown extends Component
{
    public $search;
    public $searchResults = [];

    public function updatedSearch($newValue){

        if ($this->search < 3 != ''){
            $this->searchResults = [];
            return;
        }
        $response = HTTP::get('https://itunes.apple.com/search/?term='.$this->search.'&limit=10');

        $this->searchResults = $response->json()['results'];
    }
    public function render()
    {
        return view('livewire.search-job-dropdown');
    }
}
