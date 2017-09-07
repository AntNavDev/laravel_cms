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

    return [
        'first_name' => $faker->name,
        'last_name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define( App\Task::class, function( Faker $faker ) {
    $developers = [];
    $dev_num = rand( 1, 3 );
    for( $index = 0; $index <= $dev_num; $index++ )
    {
        $developers[] = $faker->name();
    }


    return [
        'task_name'  => $faker->text( 35 ),
        'client'     => $faker->name(),
        'developers' => $developers,
        'hours_to_build' => round( $faker->randomFloat( NULL, 0, 250 ), 1 ),
    ];

} );
