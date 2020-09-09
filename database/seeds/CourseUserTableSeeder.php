<?php

use App\Models\CourseUser;
use Illuminate\Database\Seeder;

class CourseUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 20; $i++) {
            CourseUser::create([
                'user_id' => $i + 2,
                'course_id' => 1,
                'lesson_id' => 1,
            ]);
        }
    }
}
