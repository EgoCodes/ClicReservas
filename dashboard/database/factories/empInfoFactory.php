<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\empInfo;
use Faker\Generator as Faker;

$factory->define(empInfo::class, function (Faker $faker) {

    return [
        'empUsuario' => $faker->word,
        'empClave' => $faker->word,
        'correo' => $faker->word,
        'empImg' => $faker->word,
        'empDescripBreve' => $faker->text,
        'empDescripLarga' => $faker->text,
        'estado' => $faker->word
    ];
});
