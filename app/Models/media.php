<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class media extends Model
{   
    protected $fillable = ['plus_url','anuncio_id'];
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    public function anuncio() {
        return $this->belongsTo(anuncio::class);
    }
    
}
