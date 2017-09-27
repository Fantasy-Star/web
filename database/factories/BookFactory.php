<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Book::class, function (Faker $faker) {

    return [
        'name' => $faker->name,
        'isbn' => $faker->isbn13,
        'author' => $faker->name,
        'publisher' => $faker->name,
        'pub_date' => $faker->date(),
        'price' => $faker->randomNumber(2),
        'remain_num' => $faker->randomDigit,
        'douban_score' => $faker->randomDigit,
        'note' => $faker->text,
        'description' => $faker->text,
//        'user_id' => $faker->randomDigit,
        'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime(),
    ];
});
