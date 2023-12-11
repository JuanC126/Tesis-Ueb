<?php

namespace Database\Factories;

use App\Models\anuncio;
use App\Models\User;
use App\Models\visitas;
use App\Models\media;
use App\Models\sectores;
use App\Models\servicio_basico;
use App\Models\servicio_adicional;
use App\Models\tipo_inmueble;


use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\anuncio>
 */
class anuncioFactory extends Factory
{
    protected $model = anuncio::class;
  
    public function definition(): array
    {   
        $title = $this->faker->sentence(4);
        
        //varias rutas de imagenes
        $imagenes = [];
        $numero_de_imagenes = 2;
        for ($i=0; $i < $numero_de_imagenes; $i++) { 
            $imagenes[] = 'images/'.$this->faker->image('public/storage/images',400,400, null, false);
        }
        $imagenes_str = implode(',', $imagenes);


        return [
            'titulo' => $title,
            'descripcion' => $this->faker->paragraph(10),
            'estado' => $this->faker->randomElement([anuncio::publicado, anuncio::no_publicado]),
            'user_id' => User::find(1)->id,
            'sector_id' => sectores::all()->random()->id,
            'inmueble_id' => tipo_inmueble::all()->random()->id,
            
            'foto_url' => 'images/'.$this->faker->image('public/storage/images',400,400, null, false),
            'pago_mensual'=> $this->faker->randomElement([50, 100, 150]),
            'tipo_inmueble' =>tipo_inmueble::all()->random()->inmueble, 
            'sector' => sectores::all()->random()->sector,
            'latitud' => $this->faker->latitude(-0.5, 0.5),
            'longitud' => $this->faker->longitude(-0.5, 0.5),
            'nombre_calle' => $this->faker->streetName,
            'referencia' => $this->faker->streetAddress,
            'servicio_basico' => servicio_basico::all()->random(4)->pluck('basicos'),
            'servicio_adicional' => servicio_adicional::all()->random(4)->pluck('adicionales'),
            
            'garantia' => $this->faker->randomElement(['si', 'no']),
            'garantia_valor' => $this->faker->randomElement([50, 100, 150]),
            'slug' => Str::slug($title), 
        ];
    }
}
