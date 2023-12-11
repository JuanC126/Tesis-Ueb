<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\tipo_inmueble;
class inmuebleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        tipo_inmueble::create([
            'inmueble' => 'departamento'
        ]);
        tipo_inmueble::create([
            'inmueble' => 'habitacion estudiantial'
        ]);
        tipo_inmueble::create([
            'inmueble' => 'casa compartida'
        ]);
        tipo_inmueble::create([
            'inmueble' => 'habitacion'
        ]);
        tipo_inmueble::create([
            'inmueble' => 'casa completa'
        ]);
        tipo_inmueble::create([
            'inmueble' => 'mini departamento'
        ]);
    
    }
}

