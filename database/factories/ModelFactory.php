<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Comic::class, function (Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\es_ES\Person($faker));
    return [
        'numero' => $faker->randomNumber(),
        'titulo' => $faker->name,
        'nro_paginas' => $faker->randomNumber(),
        'serie' => $faker->name,
        'idioma' => $faker->name,
        'img_portada' => $faker->url,
        'id_editorial' => 1
    ];
});
