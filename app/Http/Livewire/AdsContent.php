<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class AdsContent extends Component
{
    use WithPagination;

    public $ads;
    public $image;

    public function mount($ads, $image)
    {
        $this->ads = $ads->items();
        $this->image = $image;
    }

    public function render()
    {
        return view('livewire.ads-content');
    }

    public function setActiveAdAndPreview($adId)
    {
        $this->activeAd = $adId;
        $this->selectedPreview = $adId;
    }
}
