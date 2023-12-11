<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\servicio_basico;

class ServicioBasicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        servicio_basico::create(['basicos' => 'Ducha Caliente' ]);
        servicio_basico::create(['basicos' => 'Agua']);
        servicio_basico::create(['basicos' => 'Luz']);
        servicio_basico::create(['basicos' => 'Internet']);
      
    }
}
