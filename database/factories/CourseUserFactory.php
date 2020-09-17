<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CourseUser;
use Faker\Generator as Faker;

$factory->define(CourseUser::class, function (Faker $faker) {
    return [
        'user_id' => rand(103, 203),
        'course_id' => rand(1, 113),
        'lesson_id' => null,
    ];
});
