<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\anuncio;
use App\Models\media;
use App\Models\User;
use App\Models\visitas;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\sectores;
use App\Models\tipo_inmueble;
use App\Models\servicio_basico;
use App\Models\servicio_adicional;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\DB;

class PublicarController extends Controller
{
    public function visits()
        {
            return $this->hasMany(visitas::class);
        }

    public function index(){
        return view('buscar.index');
    }

    public function perfil(){     
        $usuario = User::where('id', auth()->user()->id)->first();
        return view('publicar.perfil', compact('usuario'));
    }

    public function edit($slug) {  
        
        $sectores = sectores::pluck('sector', 'id')->toArray();
        $tipo_inmuebles = tipo_inmueble::pluck('inmueble', 'id')->toArray();
        $servicios_basicos = servicio_basico::pluck('basicos', 'id')->toArray();
        $servicios_adicionales = servicio_adicional::pluck('adicionales', 'id')->toArray();
       
        
        $usuario = User::where('id', auth()->user()->id)->first();
    
        $anuncio = anuncio::where('slug', $slug)->first();
       
        return view('publicar.editar', compact('usuario', 'anuncio', 'sectores', 'tipo_inmuebles', 'servicios_basicos', 'servicios_adicionales'));
    }

    public function update(Request $request, $slug) {
        $anuncio = anuncio::where('slug', $slug)->firstOrFail();
        //sector
        $sectorId = $request->input('sector');
        $sectorName = DB::table('sectores')->where('id', $sectorId)->value('sector');
        $anuncio->sector_id=$sectorId;
        $anuncio->sector = $sectorName;
        $request->merge(['sector' => $sectorName,'sector_id' => $sectorId]);
        //inmueble
        $inmuebleId = $request->input('inmueble');
        $inmuebleName = DB::table('tipo_inmuebles')->where('id', $inmuebleId)->value('inmueble');
        $anuncio->inmueble_id=$inmuebleId;
        $anuncio->tipo_inmueble = $inmuebleName;
        $request->merge(['tipo_inmueble' => $inmuebleName,'inmueble_id' => $inmuebleId]);

        if ($request->has('servicio_basico')) {
            $request->merge(['servicio_basico' => implode(", ", $request->input('servicio_basico'))]);
        }
        if ($request->has('servicio_adicional')){
            $request->merge(['servicio_adicional'=>implode(",", $request->input('servicio_adicional'))]);
        }
    
        // Actualiza el anuncio con los datos
       
        $anuncio->update($request->all());

        if($request->file('foto_url')){
            $url = Storage::disk('public')->put('images', $request->file('foto_url'));
            if($anuncio->foto_url){
                Storage::delete($anuncio->foto_url);
            }
            $anuncio->update(['foto_url' => $url]);
        }
        return redirect()->route('publicar.perfil', $anuncio->slug)->with('message', 'Datos del nuncio actualizado con éxito! ');
    }
    public function update2(Request $request, $slug) {
        $anuncio = anuncio::where('slug', $slug)->firstOrFail();
        $mediaItems = media::where('anuncio_id', $anuncio->id)->get();

        foreach($mediaItems as $media) {
            // Obtiene la URL de la imagen
            $url = $media->plus_url;
            
            // Elimina la imagen
            Storage::disk('public')->delete($url);
        
            // Elimina el registro de la base de datos
            $media->delete();
        }
    
        // Guarda las nuevas fotos
        $images = [];
        foreach($request->file('fotos') as $image) {
            $path = $image->store('fotos', 'public');
            $images[] = $path;
    
            // Crea un nuevo registro en la base de datos para cada imagen
            media::create([
                'anuncio_id' => $anuncio->id,
                'plus_url' => $path
            ]);
        }
    
        return redirect()->route('publicar.perfil', $anuncio->slug)->with('message', 'Fotos actualizadas con éxito!');
    }
  

    public function eliminar($slug){     
        $anuncio = anuncio::where('slug', $slug)->firstOrFail();
        $anuncio->delete();

    return redirect()->route('publicar.perfil')->with('message', 'Anuncio eliminado con éxito!');
    }

    public function create(){     
        $usuario = User::where('id', auth()->user()->id)->first();
        $sectores = sectores::pluck('sector', 'id')->toArray();
        $tipo_inmuebles = tipo_inmueble::pluck('inmueble', 'id')->toArray();
        $servicios_basicos = servicio_basico::pluck('basicos', 'id')->toArray();
        $servicios_adicionales = servicio_adicional::pluck('adicionales', 'id')->toArray();

        $anuncio = new anuncio;
        $anuncio->user_id = auth()->user()->id;
        if (!$sectores || !$tipo_inmuebles) {
            // Handle the error, e.g. return an error message
            return back()->with('error', 'No se pudieron cargar los sectores o los tipos de inmuebles.');
        }
        return view('publicar.create', compact('usuario', 'sectores', 'tipo_inmuebles', 'anuncio', 'servicios_basicos', 'servicios_adicionales'));
    }

    public function createF(Request $request)
    {
    
        $anuncio = new anuncio;
        $anuncio->fill($request->all());
        $sector = sectores::find($request->input('sector'));
        $tipo_inmuebles= tipo_inmueble::find($request->input('inmueble'));

        // Guarda el nombre y el ID del sector
        $anuncio->sector = $sector->sector;
        $anuncio->sector_id = $sector->id;
        $anuncio->tipo_inmueble = $tipo_inmuebles->inmueble;
        $anuncio->inmueble_id = $tipo_inmuebles->id;
        
        //checboxes
        $anuncio->servicio_adicional = implode(',', $request->input('servicio_adicional', []));
        $anuncio->servicio_basico = implode(',', $request->input('servicio_basico', []));

        if($request->hasFile('foto_url')){
            $path = $request->file('foto_url')->store('images', 'public');
            $anuncio->foto_url = $path;
            
        }
        $anuncio->slug = Str::slug($request->input('titulo'));
        $anuncio->save();
        return redirect()->route('publicar.fotos', ['id' => $anuncio->id])->with('message', 'Anuncio creado con éxito!');
    }


    public function show($slug)
    {   
        
        $anuncio = anuncio::where('slug', $slug)->first();
        $usuario= User::where('id', $anuncio->user_id)->first();
        $fotos = $anuncio->media;
    
        // Registra la visita
        $anuncio->visitas()->create(['visitor_ip' => request()->ip()]);
    
        // Divide las rutas por comas
        $imagePaths = explode(',', $anuncio->fotosvar_url);
        $anuncio->fotosvar_url = $imagePaths;
    
        return view('publicar.show', compact('anuncio', 'fotos','usuario'));
    }

    public function fotos($id){
        $anuncio = anuncio::find($id);
        return view('publicar.fotos', compact('anuncio'));
    }

    public function fotosC(Request $request,$id){
        $anuncio = anuncio::find($id);
       
        if($request->hasFile('fotos')) {
            foreach($request->file('fotos') as $foto) {
                $path = $foto->store('fotos', 'public');
            
                $media = new media;
                $media->anuncio_id = $anuncio->id;
                $media->plus_url = $path;
                
                $media->save();
            }
        }

        return redirect('perfil');
    }
}
