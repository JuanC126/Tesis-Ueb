<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\sectores;
use App\Models\tipo_inmueble;
use App\Models\servicio_adicional;
use App\Models\servicio_basico;
use App\Models\anuncio;

class HomeController extends Controller
{
    public function index(){
        $tipo_inmuebles = tipo_inmueble::all(); 
        $sectores = sectores::all();
        $serviciosAdicionales =servicio_adicional::all();
        $serviciosBasicos=servicio_basico::all();
        $anuncios = anuncio::all();


        return view('admin.index', compact('anuncios','sectores', 'tipo_inmuebles','serviciosBasicos','serviciosAdicionales'));
    }

    public function delete($id){     
        $anuncio = anuncio::where('id', $id)->firstOrFail();
        $anuncio->delete();

        return redirect()->route('index')->with('message', 'Anuncio eliminado con éxito!');
}
}