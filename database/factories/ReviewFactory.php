<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'content' => $faker->text(1000),
        'rate' => rand(1, 5),
        'type' => 0,
        'target_id' => 1,
        'user_id' => 1,
    ];
});
