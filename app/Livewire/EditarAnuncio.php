<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class EditarAnuncio extends Component
{
    use WithFileUploads;

    public $anuncio;
    public $newImage;

    public function mount($anuncio)
    {
        $this->anuncio = $anuncio;
    }

    public function save()
    {
        $this->validate([
            'newImage' => 'image|max:1024',  // Validación de la imagen
        ]);

        $imageName = $this->newImage->store('images', 'public');

        $this->anuncio->update(['image' => $imageName]);

        $this->newImage = null;
    }
    public function render()
    {
        return view('livewire.editar-anuncio');
    }
}
