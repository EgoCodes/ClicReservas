<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\hor;
use Faker\Generator as Faker;

$factory->define(hor::class, function (Faker $faker) {

    return [
        'hora' => $faker->word
    ];
});
