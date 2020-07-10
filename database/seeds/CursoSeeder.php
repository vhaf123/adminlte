<?php

use Illuminate\Database\Seeder;

use App\Curso;


class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cursos = Curso::all();

        foreach ($cursos as $curso) {
            $curso->update([
                'title' => $curso->name,
                'description' => $curso->descripcion
            ]);
        }
    }
}
