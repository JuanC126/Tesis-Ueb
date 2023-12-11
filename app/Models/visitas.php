<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class visitas extends Model
{ protected $fillable = ['visitor_ip'];
    use HasFactory;
    public function anuncio()
{
    return $this->belongsTo(anuncio::class);
}
}
