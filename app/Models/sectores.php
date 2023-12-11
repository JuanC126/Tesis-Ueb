<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sectores extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    //relacion 1 a muchos
    public function anuncios(){
        return $this->hasMany('app\Models\anuncio');
    }
}
