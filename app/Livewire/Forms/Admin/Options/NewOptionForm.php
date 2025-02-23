<?php

namespace App\Livewire\Forms\Admin\Options;

use App\Models\Option;
use Livewire\Attributes\Validate;
use Livewire\Form;

class NewOptionForm extends Form
{
    public $name;
    public $type = 1;
    public $features = [
        [
            'value' => '',
            'description' => '',

        ],
    ];
    public $openModal = false;


    public function rules()
    {

        $rules = [
            'name' => 'required',
            'type' => 'required|in:1,2',
            'features' => 'required',
        ];
        foreach ($this->features as $index => $feature) {

            if ($this->type == 1) {
                $rules['features.' . $index . '.value'] = 'required';
            } else {
                $rules['features.' . $index . '.value'] = 'required|regex:/^#[a-F0-9]{6}?$)/i';
            }

            $rules['features.' . $index . '.description'] = 'required';
        }
        $this->validate($rules);

        return $rules;
    }

    public function validationAttributes()//paraque salga en el error los nombres de los campos traducidos
    {
        $attributes=[
            'name'=>'nombre',
            'type'=>'tipo',
            'features'=>'valores',

        ];
        foreach ($this->features as $index => $feature) {
            $attributes['features.' . $index . 'value']='valor'.($index+1);
            $attributes['features.' . $index . 'description']='descripcion'.($index+1);
        }

        return $attributes;
    }


    public function save()
    {
        $this->validate();

        $option = Option::create([
            'name' => $this->name,
            'type' => $this->type,
        ]);
        foreach ($this->features as $feature) {
            $option->features()->create([
                'value' => $feature['value'],
                'description' => $feature['description'],

            ]);
        }

        $this->reset();
    }

    public function addFeature()
    {
        $this->features[] = [
            'value' => '',
            'description' => '',
        ];
    }

    public function removeFeature($index)
    {
        unset($this->features[$index]);
        $this->features = array_values($this->features);
    }

}
