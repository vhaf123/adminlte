<?php

use Illuminate\Database\Seeder;

use App\Manual;
use App\Capitulo;
use App\Tema;

class ManualSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Manual::class, 30)->create()->each(function(Manual $manual){

            factory(Capitulo::class, 5)->create([
                
                'manual_id' => $manual->id

            ])->each(function(Capitulo $capitulo){

                factory(App\Tema::class, 6)->create([
                    'capitulo_id' => $capitulo->id
                ]);

            });
        });
    }
}
