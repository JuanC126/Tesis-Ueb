<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_inmueble extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    //relacion 1 a muchos
    public function anuncios(){
        return $this->hasMany('app\Models\anuncio');
    }
    public function inmueble() {
        return $this->belongsTo(\App\Models\Inmueble::class);
    }
   
}
