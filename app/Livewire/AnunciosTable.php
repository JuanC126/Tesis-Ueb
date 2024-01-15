<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\anuncio;
use Livewire\WithPagination;
class AnunciosTable extends Component
{
    public function render()
{
    $anuncios = anuncio::all(); 
    return view('admin.index', compact('anuncios'));    
}

public function limpiar(){

    $this->resetPage('page');

}
}
