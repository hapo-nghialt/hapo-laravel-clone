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
        for ($i = 1; $i < rand(50, 101); $i++) {
            for ($j = 1; $j < rand(1, 50); $j++) {
                CourseUser::create([
                    'user_id' => $i + 102,
                    'course_id' => $j,
                    'lesson_id' => null,
                ]);
            }
        }
    }
}
