<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Lesson;
use Faker\Generator as Faker;

$factory->define(Lesson::class, function (Faker $faker) {
    return [
        'name' => $faker->realText($maxNbChars = 40, $indexSize = 2),
        'description' => $faker->realText($maxNbChars = 500, $indexSize = 2),
        'requirement' => $faker->realText($maxNbChars = 500, $indexSize = 2),
        'time' => rand(5, 10),
        'course_id' => 12,
    ];
});
