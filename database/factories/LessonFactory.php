<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Lesson;
use Faker\Generator as Faker;

$factory->define(Lesson::class, function (Faker $faker) {
    return [
        'name' => $faker->text(30),
        'description' => $faker->text(500),
        'requirement' => $faker->text(500),
        'time' => rand(1, 12),
        'course_id' => '1',
    ];
});
