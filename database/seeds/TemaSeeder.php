<?php

use Illuminate\Database\Seeder;
use App\Tema;

use Illuminate\Support\Str;

class TemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $temas = Tema::all();

        foreach ($temas as $tema) {
            
            $slug = Str::slug($tema->name, '-');

            $tema->update([
                'slug' => $slug
            ]);
            
        }
    }
}
