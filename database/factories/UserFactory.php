<?php

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

    // return [
    //     'name' => $faker->name,
    //     'email' => $faker->unique()->safeEmail,
    //     'password' => $password ?: $password = bcrypt('secret'),
    //     'remember_token' => str_random(10),
    // ];
    return [
        'first_name'     => 'Anthony',
        'last_name'      => 'Navarro',
        'email'          => 'anavarro@three29.com',
        'password'       => '$2y$10$UHVBr8XE8oVXwHqOFBV6eO1U5CpTgtHAi2QsYqDYUSZ2pZoLnFB9C', //this encoded password is 'testing'
        'role'           => 'admin',
        'remember_token' => str_random(10),
    ];
});
