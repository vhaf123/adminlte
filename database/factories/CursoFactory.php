<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Curso;
use Faker\Generator as Faker;

$factory->define(Curso::class, function (Faker $faker) {
    return [
        'profesor_id' => \App\Profesor::all()->random()->id,
        'categoria_id' => \App\Categoria::all()->random()->id,
        'nivel_id' => \App\Nivel::all()->random()->id,
        'tipo_id' => \App\Tipo::all()->random()->id,
        'name' => $faker->sentence,
        'descripcion' => $faker->paragraph,
        'status' => $faker->randomElement([1, 2, 3])
    ];
});
