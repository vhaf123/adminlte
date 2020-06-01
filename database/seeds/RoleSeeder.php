<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Admin',
            'slug' => 'Admin',
            'description' => 'Acceso total',
        ])->permissions()->attach([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19]);

        Role::create([
            'name' => 'Profesor',
            'slug' => 'Profesor',
            'description' => 'Puede crear cursos, editarlos y eliminarlos',
        ])->permissions()->attach([1, 5, 6, 7, 8, 9]);

        Role::create([
            'name' => 'Blogger',
            'slug' => 'Bloger',
            'description' => 'Puede crear post, editarlos y eliminarlos',
        ])->permissions()->attach([1, 10, 11, 12, 13, 14]);

        Role::create([
            'name' => 'Creador de contenidos',
            'slug' => 'Creador',
            'description' => 'Puede crear, editarlos y eliminar manuales',
        ])->permissions()->attach([1, 15, 16, 17, 18, 19]);
        
    }
}
