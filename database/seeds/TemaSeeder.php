<?php

use Illuminate\Database\Seeder;
use App\Tema;

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
            $tema->update([
                'title' => $tema->name,
                'description' => $tema->descripcion
            ]);
        }
    }
}
