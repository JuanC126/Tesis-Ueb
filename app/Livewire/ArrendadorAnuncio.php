<?php

namespace App\Livewire;
use App\Models\User;
use App\Models\anuncio;
use App\Models\visitas;
use Livewire\Component;

class ArrendadorAnuncio extends Component
{  
   

    public $Dropdown_1 = ['casa', 'departamento', 'habitacion estudiantil', 'mini departamento',     'habitacion compartida' ];
    public $Dropdown_2 = ['agua', 'luz','internet','cable','baño privado'];
    public $Dropdown_3 = ['parqueadero','armario','muebles de cocina','amoblado'];
    public $Dropdawn4 = [
        'Guanujo',
        'Universidad',
        'Mantilla',
        'Alpachaca',
        'El Dorado',
        'Floresta',
        'Primero de Mayo',
        'Trigales',
        'Los Tanques',
        'Indio Guaranga',
        'Empresa Eléctrica',
        'Montufar',
        'Colinas',
        'El Terminal',
        'La Guitarra',
        'La Playa',
        'Laguacoto',
        '9 de Octubre',
        '5 de Junio',
        'La Merced',
        'Juan XIII',
        'Fausto Basante',
        'Cruz Roja',
        'Parque Industrial',
        'Chalata',
        'Tomabela',
        'Joyocoto',
        'Vinchoa',
        'Casipamba',
        'Peñon',
        'San Bartolo',
        'Bellavista',
        'El Cortijo',
        'Loma del Calvario',
        'Negroyaco'
    ];
    
  
    public $selectedOption = null;
    public $selectedOption2 = null;
    public $selectedOption3 = null;
    public $selectedOption4 = null;
    public $noResultsMessage = null;


    public function seleccionarTipoInmueble($option)
    {
        $this->selectedOption = $option;
    }

    public function seleccionarServicioB($option2)
    {
        $this->selectedOption2 = $option2;
    }
    public function seleccionarServicioA($option3)
    {
        $this->selectedOption3 = $option3;
    }
    public function seleccionarSector($option4)
    {
        $this->selectedOption4 = $option4;
    }
 
    public function render()
    {
        $Dropdawn1 = $this->Dropdown_1;
        $Dropdawn2 = $this->Dropdown_2;
        $Dropdawn3 = $this->Dropdown_3;
        $Dropdawn4 = $this->Dropdawn4;

        
        $usuario = User::where('id', auth()->user()->id)->first();

        $anuncios = anuncio::where('user_id', $usuario->id)->get();

       /*  $visitas=visitas::where('anuncio_id', $anuncios->user_id)->get(); */

        foreach ($anuncios as $anuncio) {
            // Divide las rutas por comas
            $imagePaths = explode(',', $anuncio->fotosvar_url);
            $anuncio->fotosvar_url = $imagePaths;
        }
        
        return view('livewire.arrendador-anuncio', compact('usuario','anuncios','Dropdawn1','Dropdawn2','Dropdawn3','Dropdawn4'));
    }

    public function eliminarAnuncio($anuncioId)
    {
        $anuncio = anuncio::find($anuncioId);

        if ($anuncio) {
            // Eliminar el anuncio de la base de datos
            $anuncio->delete();
        }

        // Actualizar la lista de anuncios después de la eliminación
        $this->render();
    }
    public function refreshAnuncio()
    {
        

        $this->render();
    }

    public function toggleAnuncio($anuncioId)
    {
        $anuncio = anuncio::find($anuncioId);

        if ($anuncio) {
            $anuncio->estado = $anuncio->estado == '1' ? '2' : '1';
            $anuncio->save();
        }

        // Actualizar la lista de anuncios después de cambiar el estado
        $this->render();
    }


}
