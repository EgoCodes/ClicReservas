<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\client;
use Faker\Generator as Faker;

$factory->define(client::class, function (Faker $faker) {

    return [
        'cliNombre' => $faker->word,
        'cliCc' => $faker->word,
        'cliDireccion' => $faker->word,
        'cliTelefono' => $faker->word,
        'cliMail' => $faker->word,
        'idPerfilR' => $faker->randomDigitNotNull,
        'idBarRe' => $faker->word
    ];
});
