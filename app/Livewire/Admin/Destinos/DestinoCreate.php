<?php

namespace App\Livewire\Admin\Destinos;

use App\Models\Country;
use Livewire\Component;
class DestinoCreate extends Component
{
    public $ciudades='';
   
    
    public function render()
    {
        $paises=Country::all();
        return view('livewire.admin.destinos.destino-create',compact('paises'));
    }
}
