<?php

use Illuminate\Database\Seeder;
use App\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'name' => 'Desarrollo web', 
        ]);

        Categoria::create([
            'name' => 'Diseño web', 
        ]);

        Categoria::create([
            'name' => 'Programacion', 
        ]);

        Categoria::create([
            'name' => 'Ofimatica', 
        ]);

        Categoria::create([
            'name' => 'Ofimática VBA', 
        ]);
    }
}
