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
        for ($i = -1; $i < 40; $i++) {
            CourseUser::create([
                'user_id' => $i + 2,
                'course_id' => 3,
                'lesson_id' => null,
            ]);
        }
    }
}
