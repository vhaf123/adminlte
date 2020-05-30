<?php

use Illuminate\Database\Seeder;

use App\Curso;
use App\Meta;
use App\Requisito;
use App\Modulo;
use App\Video;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Curso::class, 50)->create()->each(function(Curso $curso){

            $curso->update([
                'picture' => 'img/cursos/show/' . $curso->id . ".jpg"
            ]);

            factory(Meta::class, 3)->create([
                'curso_id' => $curso->id
            ]);

            factory(Requisito::class, 3)->create([
                'curso_id' => $curso->id
            ]);

            factory(Modulo::class, 4)->create([
                'curso_id' => $curso->id
            ])->each(function(Modulo $modulo){
                factory(Video::class, 6)->create(['modulo_id' => $modulo->id]);
            });

        });
    }
}
