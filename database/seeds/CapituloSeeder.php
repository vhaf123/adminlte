<?php

use Illuminate\Database\Seeder;
use App\Capitulo;

use Illuminate\Support\Str;

class CapituloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $capitulos = Capitulo::all();

        foreach ($capitulos as $capitulo) {
            
            $slug = Str::slug($capitulo->name, '-');

            $capitulo->update([
                'slug' => $slug
            ]);
            
        }
    }
}
