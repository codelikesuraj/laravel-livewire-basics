<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SearchDropdown extends Component
{
    public $search;
    public $searchResults = [];

    public function render()
    {
        $response = Http::get('https://itunes.apple.com/search/?term='.''.'&limit=10');
        // dd($response->json());

        return view('livewire.search-dropdown');
    }

    public function updatedSearch()
    {
        $response = Http::get('https://itunes.apple.com/search/?term='.$this->search.'&limit=10');
        $this->searchResults = $response['results'];
    }
}
