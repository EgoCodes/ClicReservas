<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ventanilla;
use Faker\Generator as Faker;

$factory->define(ventanilla::class, function (Faker $faker) {

    return [
        'VenNumero' => $faker->word
    ];
});
