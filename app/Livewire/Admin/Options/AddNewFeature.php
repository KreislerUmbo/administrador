<?php

namespace App\Livewire\Admin\Options;

use Livewire\Component;

class AddNewFeature extends Component
{
    public $option;
    public $newFeature=[
        'value'=>'',
        'description'=>'',
    ];

public function addFeature()
{
    $this->validate([
        'newFeature.value'=>'required',
        'newFeature.description'=>'required',
    ]);

    $this->option->features()->create($this->newFeature); //los rcrea

    $this->dispatch('featureAdded');
    
    $this->reset('newFeature'); //limpia los cmapos

}


    public function render()
    {
        return view('livewire.admin.options.add-new-feature');
    }
}
