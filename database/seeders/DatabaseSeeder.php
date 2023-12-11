<?php

namespace Database\Seeders;
use App\Models\Anuncio;
use App\Models\media;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Storage::deleteDirectory('images');
        Storage::makeDirectory('images');

     
            
        $this->call(UserSeeder::class);
        $this->call(InmuebleSeeder::class);
        $this->call(SectoresSeeder::class);
        $this->call(ServicioBasicoSeeder::class);
        $this->call(ServicioExtraSeeder::class);
        $this->call(AnuncioSeeder::class);
            

            



    }
}
