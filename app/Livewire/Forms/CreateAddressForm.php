<?php

namespace App\Livewire\Forms;

use App\Enums\TypeOfDocuments;
use App\Models\Address;
use Illuminate\Validation\Rules\Enum;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateAddressForm extends Form
{
    public $type = '';
    public $description = '';
    public $district = '';
    public $reference = '';
    public $receiver = 1;
    public $receiver_info = [];
    public $default = false;


    public function rules()
    {
        return [
            'type' => 'required|in:1,2', //puede ser 1 o 2
            'description' => 'required|string',
            'district' => 'required|string',
            'reference' => 'required|string',
            'receiver' => 'required|in:1,2',
            'receiver_info' => 'required|array',
            'receiver_info.name' => 'required|string',
            'receiver_info.last_name' => 'required|string',
            'receiver_info.document_type' => [
                'required',
                new Enum(TypeOfDocuments::class)
            ],
            'receiver_info.document_number' => 'required|string',
            'receiver_info.phone' => 'required|string',
        ];
    }

    public function validationAttributes()
    {
        return [
            'type' => 'Tipo de Direccion',
            'description' => 'Descripcion',
            'district' => 'Distrito',
            'reference' => 'Referencia',
            'receiver' => 'Receptor',
            'receiver_info.name' => 'Nombre',
            'receiver_info.last_name' => 'Apellidos',
            'receiver_info.document_type' => 'Tipo de Documento',
            'receiver_info.document_number' => 'Numero de Documento',
            'receiver_info.phone' => 'Telefóno',
        ];
    }


    public function save()
    {
        $this->validate();
        if (auth()->user()->addresses->count() === 0)
        {
            $this->default=true;
        }
            Address::create([
                'user_id'=>auth()->id(),
                'type' => $this->type,
                'description' => $this->description,
                'district' => $this->district,
                'reference' => $this->reference,
                'receiver' => $this->receiver,
                'receiver_info' => $this->receiver_info,
                'default' => $this->default,

            ]);

        $this->reset();
        $this->receiver_info = [
            'name' => auth()->user()->name,
            'last_name' => auth()->user()->last_name,
            'document_type' => auth()->user()->document_type,
            'document_number' => auth()->user()->document_number,
            'phone' => auth()->user()->phone,
        ];
    }
}
