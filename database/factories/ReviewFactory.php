<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'content' => $faker->realText(300),
        'rate' => rand(1, 5),
        'type' => 0,
        'target_id' => rand(1, 12),
        'user_id' => rand(103, 203),
    ];
});
