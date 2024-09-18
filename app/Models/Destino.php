<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destino extends Model
{
    use HasFactory;


    

    public function imagenesdestino() // relacionamos con la tabla de imagenesdestino
    {
        return $this->hasMany(ImagenesDestino::class);
    }

    public function primaryImage() // esto es funcion para elegir imagen prinicipal
    {
        return $this->hasOne(ImagenesDestino::class)->where('is_primary', true);
    }

}
