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

$factory->define(App\Models\User::class, function (Faker $faker) {
    $date_time = $faker->date . ' ' . $faker->time;
    $stu_id = $faker->randomNumber($nbDigits = 6) . $faker->randomNumber($nbDigits = 6);
    static $password;

    return [
        'stu_id' => $stu_id,
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'city' => $faker->city,
        'activated' => true,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'created_at' => $date_time,
        'updated_at' => $date_time,
    ];
});
