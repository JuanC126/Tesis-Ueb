<?php

namespace Database\seeders;

use Illuminate\Database\Console\seeds\WithoutModelEvents;
use Illuminate\Database\seeder;

use App\Models\sectores;

class SectoresSeeder extends seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        sectores::create(['sector' => 'Guanujo']);
        sectores::create(['sector' => 'Universidad']);
        sectores::create(['sector' => 'Mantilla']);
        sectores::create(['sector' => 'Alpachaca']);
        sectores::create(['sector' => 'El Dorado']);
        sectores::create(['sector' => 'Floresta']); 
        sectores::create(['sector' => 'Primero de Mayo']);
        sectores::create(['sector' => 'Trigales']);
        sectores::create(['sector' => 'Los Tanques']);
        sectores::create(['sector' => 'Indio Guaranga']);
        sectores::create(['sector' => 'Empresa Eléctrica']);
        sectores::create(['sector' => 'Montufar']);
        sectores::create(['sector' => 'Colinas']);
        sectores::create(['sector' => 'El Terminal']);
        sectores::create(['sector' => 'La Guitarra']);
        sectores::create(['sector' => 'La Playa']);
        sectores::create(['sector' => 'Laguacoto']);
        sectores::create(['sector' => '9 de Octubre']);
        sectores::create(['sector' => '5 de Junio']);
        sectores::create(['sector' => 'La Merced']);
        sectores::create(['sector' => 'Juan XIII']);
        sectores::create(['sector' => 'Fausto Basante']);
        sectores::create(['sector' => 'Cruz Roja']);
        sectores::create(['sector' => 'Parque Industrial']);
        sectores::create(['sector' => 'Chalata']);
        sectores::create(['sector' => 'Tomabela']);
        sectores::create(['sector' => 'Joyocoto']);
        sectores::create(['sector' => 'Vinchoa']);
        sectores::create(['sector' => 'Casipamba']);
        sectores::create(['sector' => 'Peñon']);
        sectores::create(['sector' => 'san Bartolo']);
        sectores::create(['sector' => 'Bellavista']);
        sectores::create(['sector' => 'El Cortijo']);
        sectores::create(['sector' => 'Loma del Calvario']);
        sectores::create(['sector' => 'Negroyaco']);


    }
}
