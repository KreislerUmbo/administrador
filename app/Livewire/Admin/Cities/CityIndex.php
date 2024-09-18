<?php

namespace App\Livewire\Admin\Cities;

use Livewire\Component;
use App\Models\City;

class CityIndex extends Component
{
    public $search; //para sincrinzar con el buscador de index que le llamamos $search

  

    public function render()
    {
        $cities = City::orderBy('id', 'desc')
            ->where('name', 'LIKE', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.admin.cities.city-index', compact('cities'));
    }
}
