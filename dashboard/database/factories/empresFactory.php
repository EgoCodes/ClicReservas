<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\empres;
use Faker\Generator as Faker;

$factory->define(empres::class, function (Faker $faker) {

    return [
        'empNombre' => $faker->word,
        'empNit' => $faker->word,
        'empDireccion' => $faker->word,
        'empTelefono' => $faker->word,
        'idBarrioR' => $faker->word,
        'idInfoR' => $faker->randomDigitNotNull
    ];
});
