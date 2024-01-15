<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user=User::create([
            'name' => 'Juan',
            'email' => 'jucalvache@mailes.ueb.edu.ec',
            'password' => bcrypt('12345678')]);

        $user->assignRole('admin');

        User::factory(10)->create(); 

    }
}
