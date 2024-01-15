<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class anuncio extends Model {   
    protected $fillable = ['latitud','longitud','slug','celular','titulo','user_id','descripcion','pago_mensual', 
    'nombre_calle','referencia','garantia','garantia_valor','foto_url','sector','tipo_inmueble',
    'servicio_basico','servicio_adicional','anuncio','sector_id','inmueble_id' ];
    protected $guarded = [
        'id'
    ];
  
    use HasFactory;

    const publicado=1;
    const no_publicado=2;

    //relacion uno a muchos inversa
    
    public function scopeSector($query, $sector_id, ) {
        if($sector_id){
          return   $query->where('sector_id', $sector_id);
        }
    }

    public function scopeInmueble($query, $inmueble_id) {
        if($inmueble_id){
          return   $query->where('inmueble_id', $inmueble_id);
        }
    }

    public function scopeAdicional($query, $servicio_adicional)
    {     
        if ($servicio_adicional) {
            return  $query->Where('servicio_adicional', 'like', '%' . $servicio_adicional. '%');
        }
    }

    public function servicios_basicos()
    {
        return $this->hasMany(servicio_basico::class);
    }

    public function serviciosAdicionales()
    {
        return $this->belongsToMany(servicio_adicional::class);
    }

    public function sector() {
        return $this->belongsTo(sectores::class );
    }
    
    public function inmueble() {
        return $this->belongsTo(tipo_inmueble::class, );
    }
    public function user()
    {
        return $this->belongsTo(User::class, );
    }

    // Relación uno a muchos con el modelo Visualizacion
    public function visitas() {
        return $this->hasMany(visitas::class);
    }
    public function media() {
        return $this->hasMany(media::class);
    }

    public function clicAnuncio($id){
    $anuncio = anuncio::find($id);

    if ($anuncio) {
        $anuncio->incrementarVisualizaciones(); // Este método debe incrementar el contador de visualizaciones
        // Puedes redirigir al usuario al anuncio o a donde desees después de hacer clic
        return redirect()->route('anuncio.detalle', ['id' => $anuncio->id]);
    } else {
        // Manejar el caso en el que el anuncio no se encuentre
    }
    }

    public function scopePrecioRange($query, $range)
    {
        if ($range) {
            logger("Ingresando a scopeAdicional con valor: $range");
            // Aquí deberías ajustar la lógica según la estructura de tu modelo y cómo almacenas los precios
            $prices = explode('-', $range);
            $minPrice = $prices[0];
            $maxPrice = $prices[1];

            // Añade la condición para el rango de precios a la consulta
            $query->whereBetween('pago_mensual', [$minPrice, $maxPrice]);
        }
        return $query;
    }

}
