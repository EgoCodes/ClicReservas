<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\cantVent;
use Faker\Generator as Faker;

$factory->define(cantVent::class, function (Faker $faker) {

    return [
        'idEmpresaR' => $faker->randomDigitNotNull,
        'idVentR' => $faker->word
    ];
});
