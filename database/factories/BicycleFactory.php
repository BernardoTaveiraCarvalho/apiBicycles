<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Bicycle;
use Faker\Generator as Faker;

$factory->define(Bicycle::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 7),
        'brand' => $faker->name,
        'model' => $faker->firstName,
        'color' => $faker->colorName,
        'price' => $faker->numberBetween(1,20),
    ];
});
