<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\servicio_adicional;
class ServicioExtraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       servicio_adicional::create(['adicionales'=>'Estacionamiento']);
       servicio_adicional::create(['adicionales'=>'Se permite mascotas']);
       servicio_adicional::create(['adicionales'=>'Muebles de cocina']);
       servicio_adicional::create(['adicionales'=>'Guardiania']);
       servicio_adicional::create(['adicionales'=>'Armario']);
       servicio_adicional::create(['adicionales'=>'Amoblado']);
       
    }
}
