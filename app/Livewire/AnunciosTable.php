<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\anuncio;
class AnunciosTable extends Component
{
    public function render()
{
    $anuncios = anuncio::all(); // Recupera tus datos de la base de datos
    return view('admin.index', compact('anuncios'));
}

}
