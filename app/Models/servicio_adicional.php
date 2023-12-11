<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class servicio_adicional extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    public function anuncio()
    {
        return $this->belongsToMany(anuncio::class);
    }
}
