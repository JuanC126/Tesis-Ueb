<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\anuncio;
use Illuminate\Support\Facades\DB;
use App\Models\sectores;
use App\Models\tipo_inmueble;
use App\Models\servicio_adicional;
use App\Models\servicio_basico;
use Livewire\WithPagination;

class BuscarIndex extends Component
{
    public $sector_id;
    public $inmueble_id;
    public $search;
    public $servicio_adicional;
    public $precio_range;
    public $refrescar;
   
   
    public function SerAdic ($adicionales)
    {
        $this->servicio_adicional = $adicionales;
    }


    public function render()
    {
        $precios = [
            '0-50' => '0 - 50',
            '50-100' => '51 - 100',
            '101-150' => '101 - 150',
        ];
        $tipo_inmuebles = tipo_inmueble::all(); 
        $sectores = sectores::all();
        $serviciosAdicionales =servicio_adicional::all();

        $anuncios = anuncio::where('estado', 1)
                            ->sector($this->sector_id)
                            ->adicional($this->servicio_adicional)
                            ->inmueble($this->inmueble_id)
                            ->where(function ($query) {
                                $query->where('titulo', 'like', '%' . $this->search . '%')
                                      ->orWhere('pago_mensual', 'like', '%' . $this->search . '%')
                                      ->orWhere('sector', 'like', '%' . $this->search . '%')
                                      ->orWhere('servicio_basico', 'like', '%' . $this->search . '%')
                                      ->orWhere('descripcion', 'like', '%' . $this->search . '%')
                                      ->orWhere('servicio_adicional', 'like', '%' . $this->search . '%');
                            })
                            ->precioRange($this->precio_range)
                            ->latest('id')
                            ->paginate(5);

        return view('livewire.buscar-index', compact('anuncios','sectores', 'tipo_inmuebles','precios','serviciosAdicionales'));
    }

    public function resetPage(){
        $this->reset(['sector_id', 'inmueble_id']);
    }

   public function refrescar(){
    $this->resetPage('page');
   }
   
    public function buscar()
    {
        $this->resetPage(); // Reinicia la paginación cuando se realiza una nueva búsqueda
        $this->render();
    }
    
}


