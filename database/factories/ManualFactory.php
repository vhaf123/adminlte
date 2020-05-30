<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Manual;
use Faker\Generator as Faker;

$factory->define(Manual::class, function (Faker $faker) {
    return [
        'creador_id' => \App\Creador::all()->random()->id,
        'categoria_id' => \App\Categoria::all()->random()->id,
        'name' => $faker->sentence,
        'descripcion' => $faker->paragraph,
        'status' => $faker->randomElement([1, 2])
    ];
});
