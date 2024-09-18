<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable=[
        'codigo',
        'name',
        'country_id'
    ];

    public function countries() //  una relacion de muchos a uno con paises
    {
        return $this->belongsTo(Country::class);
    }
    public function destinos() // relacionamos con destinos
    {
        return $this->hasMany(Destino::class);
    }
}
