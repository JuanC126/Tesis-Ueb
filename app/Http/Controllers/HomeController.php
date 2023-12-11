<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\anuncio;
use App\Models\User;
use App\Models\visitas;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __invoke()
    {
        // Obtén la lista de anuncios activos
        $anuncios = Anuncio::where('estado', 1)->latest()->take(8)->get();

        $anunciosPorVisitas = Anuncio::where('estado', 1)
        ->withCount('visitas')
        ->orderBy('visitas_count', 'desc')
        ->take(8)
        ->get();

        $totalAnuncios = Anuncio::where('estado', 1)->count();
        $totalUsuarios = User::count();
        foreach ($anuncios as $anuncio) {
            // Divide las rutas de las imágenes por comas
            $imagePaths = explode(',', $anuncio->fotosvar_url);
            $anuncio->fotosvar_url = $imagePaths;
        }

        return view('welcome', compact('anuncios','anunciosPorVisitas', 'totalAnuncios','totalUsuarios'));
    }

    public function AboutUs(){

        return view('policy');
    }

    public function Terms(){

        return view('terms');
    }


}
        

