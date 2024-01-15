<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create([
            'name'=> 'eliminar anuncios',
        ]);

        Permission::create([
            'name'=> 'Crear roles',
        ]);
        
        Permission::create([
            'name'=> 'Listar role',
        ]);

        Permission::create([
            'name'=> 'Editar role',
        ]);

        Permission::create([
            'name'=> 'Eliminar role',
        ]);

        Permission::create([
            'name'=> 'Ver usuarios',
        ]);

        Permission::create([
            'name'=> 'Editar usuarios',
        ]);
    }
}
