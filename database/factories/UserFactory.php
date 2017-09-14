<?php

use App\User;
use App\Role;
use App\Recepie;
use App\Ingredient;

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Recepie::class, function(Faker $faker) {
    return [
        'name' => $faker->jobTitle,
    ];
});

$factory->define(App\Ingredient::class, function(Faker $faker) {
    $metrics = ['l', 'dl', 'st', 'cl', 'g', 'liter'];
    return [
        'name' => $faker->domainWord,
        'amount' => rand(1, 10).' '.$metrics[array_rand($metrics)]
    ];
});
