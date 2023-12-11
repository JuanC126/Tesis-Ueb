<?php

namespace Database\Seeders;

use App\Models\anuncio;
use App\Models\visitas;
use Database\Factories\ImageFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class anuncioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $anuncio= anuncio::factory(20)->create();

        
            
           
    }
}

