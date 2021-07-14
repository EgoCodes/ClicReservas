<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\comprasCli;
use Faker\Generator as Faker;

$factory->define(comprasCli::class, function (Faker $faker) {

    return [
        'estado' => $faker->word,
        'idClienteR' => $faker->randomDigitNotNull,
        'idEmpHorarioR' => $faker->randomDigitNotNull,
        'fechaCompra' => $faker->word
    ];
});
