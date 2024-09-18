<?php

namespace App\Livewire\Admin\Options;

use App\Livewire\Forms\Admin\Options\NewOptionForm;
use App\Models\Feature;
use App\Models\Option;
use Livewire\Attributes\On;
use Livewire\Component;

class ManageOptions extends Component
{
    public $options;
    public NewOptionForm $newOption;


    public function mount()
    {
        $this->options = Option::with('features')->get();
    }

    #[On('featureAdded')] //escucha el dispacher del archivo AddNewFeature
    public function updateOptionList()
    {
        $this->options = Option::with('features')->get(); //para actualizar la lista de manera automatica cuando se guarda los feaotures
    }

    public function addFeature()
    {
        $this->newOption->addFeature();
    }


    public function removeFeature($index)
    {

        $this->newOption->removeFeature($index);
    }

    public function deleteFeature(Feature $feature)
    {
        ////  dd($feature->toArray());
        $feature->delete();
    }
    public function deleteOption(Option $option)
    {
        $option->delete();
        $this->options = Option::with('features')->get();
    }


    public function addOption()
    {
        $this->newOption->save();

        $this->options = Option::with('features')->get();

        $this->dispatch('swal', [
            'icon' => 'success',
            'title' => '¡Bien Hecho!',
            'text' => 'Opcion grbdos corectmente'
        ]);
    }

    public function render()
    {
        return view('livewire.admin.options.manage-options');
    }
}
