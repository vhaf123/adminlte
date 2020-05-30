<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'blogger_id' => \App\Blogger::all()->random()->id,
        'name' => $faker->sentence,
        'extracto' => $faker->text(200),
        'body' => $faker->text(10000),
        'status' => $faker->randomElement([1, 2])
    ];
});
