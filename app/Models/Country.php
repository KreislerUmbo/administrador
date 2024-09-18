<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = [
        'codpais',
        'name',
        'abrev'
    ];

    //Creamos una relacion con Ciudad
    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
