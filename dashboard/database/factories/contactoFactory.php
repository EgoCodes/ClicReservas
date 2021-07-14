<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\contacto;
use Faker\Generator as Faker;

$factory->define(contacto::class, function (Faker $faker) {

    return [
        'conNombre' => $faker->word,
        'conAsunto' => $faker->word,
        'conMail' => $faker->word
    ];
});
