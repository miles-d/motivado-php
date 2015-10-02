<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt('secret'),
        'remember_token' => str_random(10),
        'notify' => '0',
    ];
});

/**
 * Note: it implies 10 users
 * Note: it generates future-done tasks, which makes no sense
 */
$factory->define(App\Task::class, function (Faker\Generator $faker) {
    return [
        'user_id' => mt_rand(1, 10),
        'description' => Crypt::encrypt($faker->sentence),
        'motivation' => Crypt::encrypt($faker->sentence),
        'due_date' => $faker->dateTimeBetween('-5 weeks', '5 weeks')->format('Y-m-d'),
        'completed' => mt_rand(0, 1)
    ];
});
