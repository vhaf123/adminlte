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
        ]);

        Role::create([
            'name' => 'Profesor',
            'slug' => 'Profesor',
            'description' => 'Puede crear cursos, editarlos y eliminarlos',
        ]);

        Role::create([
            'name' => 'Blogger',
            'slug' => 'Bloger',
            'description' => 'Puede crear post, editarlos y eliminarlos',
        ]);

        Role::create([
            'name' => 'Creador de contenidos',
            'slug' => 'Creador',
            'description' => 'Puede crear, editarlos y eliminar manuales',
        ]);
    }
}
