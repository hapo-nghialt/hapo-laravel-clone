<?php

use App\Models\CourseTag;
use Illuminate\Database\Seeder;

class CourseTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CourseTag::create([
            'tag_id' => 1,
            'course_id' => 1,
        ]);
        CourseTag::create([
            'tag_id' => 3,
            'course_id' => 1,
        ]);
        CourseTag::create([
            'tag_id' => 4,
            'course_id' => 1,
        ]);
        CourseTag::create([
            'tag_id' => 1,
            'course_id' => 2,
        ]);
        CourseTag::create([
            'tag_id' => 4,
            'course_id' => 2,
        ]);
        CourseTag::create([
            'tag_id' => 5,
            'course_id' => 2,
        ]);
        CourseTag::create([
            'tag_id' => 1,
            'course_id' => 3,
        ]);
        CourseTag::create([
            'tag_id' => 3,
            'course_id' => 3,
        ]);
        CourseTag::create([
            'tag_id' => 5,
            'course_id' => 3,
        ]);
    }
}
