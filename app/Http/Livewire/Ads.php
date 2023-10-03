<?php

namespace App\Http\Livewire;

use App\Models\Ad;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class Ads extends Component
{
    use WithPagination;

    public function render()
    {
        $ads = Ad::paginate(1); // Change 10 to your desired number of items per page

        return view('livewire.ads', [
            'ads' => $ads,
        ]);
    }
}
