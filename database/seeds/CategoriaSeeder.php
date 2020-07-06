<?php

use Illuminate\Database\Seeder;
use App\Categoria;

use Illuminate\Support\Str;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $categorias = Categoria::all();

       foreach ($categorias as $categoria) {
            $slug = Str::slug($categoria->name, '-');
            $categoria->update([
                'slug' => $slug
            ]);
       }
    }
}
