<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagenesDestino extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'is_primary',
        'destino_id'
    ];

    public function destinos()
    {
        return $this->belongsTo(Destino::class);
    }
}
