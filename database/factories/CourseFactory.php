<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Course;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'description' => $faker->realText(300, 2),
        'price' => rand(100, 1000),
        'teacher_id' => 1,
    ];
});
