<?php

namespace App\Livewire\Admin\Destinos;

use App\Models\Destino;
use Livewire\Component;

class DestinoIndex extends Component
{
    public $search;
   
    public function render()
    {
        $destinos = Destino::orderBy('id', 'desc')
        ->where('nombredestino', 'LIKE', '%' . $this->search . '%')
        ->paginate(10);
        
        return view('livewire.admin.destinos.destino-index',compact('destinos'));
    }
}
