<?php

namespace Database\Factories;

use App\Models\Visitas;
use App\Models\Anuncio;
use Illuminate\Database\Eloquent\Factories\Factory;

class VisitasFactory extends Factory
{
    protected $model = Visitas::class;

    public function definition()
    {
        
            $anuncioId = anuncio::inRandomOrder()->first()->id;
            return [
                'anuncio_id' => $anuncioId,
                'visitas' => $this->faker->numberBetween(0, 100),
            ];
       
}

}