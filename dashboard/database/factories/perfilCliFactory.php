<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\perfilCli;
use Faker\Generator as Faker;

$factory->define(perfilCli::class, function (Faker $faker) {

    return [
        'perUsuario' => $faker->word,
        'perClave' => $faker->word,
        'perImg' => $faker->word
    ];
});
