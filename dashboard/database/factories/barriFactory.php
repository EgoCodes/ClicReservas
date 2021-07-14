<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\barri;
use Faker\Generator as Faker;

$factory->define(barri::class, function (Faker $faker) {

    return [
        'bNombre' => $faker->word
    ];
});
