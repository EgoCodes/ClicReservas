<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\empHorario;
use Faker\Generator as Faker;

$factory->define(empHorario::class, function (Faker $faker) {

    return [
        'erPrecio' => $faker->randomDigitNotNull,
        'erEstado' => $faker->word,
        'idHoraR' => $faker->randomDigitNotNull,
        'idEmpVent' => $faker->randomDigitNotNull
    ];
});
