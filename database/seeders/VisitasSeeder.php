<?php

namespace Database\Seeders;

use App\Models\visitas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VisitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        visitas::factory(20)->create();
    }
}
