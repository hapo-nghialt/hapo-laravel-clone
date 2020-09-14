<?php

use Illuminate\Database\Seeder;
use App\Models\Course;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $description = 'Practice during lessons, practice between lessons.';

        $name = [
            'HTML Fundamentals',
            'CSS Fundamentals',
            'PHP Tutorial',
            'SQL Fundamentals',
            'Swift 4 Fundamentals',
            'C# Tutorial',
            'Ruby Tutorial',
            'C Tutorial',
            'jQuery Tutorial',
            'Angular + NestJS',
            'Data Science with Python',
            'Machine Learning',
        ];

        for ($i = 0; $i < sizeof($name); $i++) {
            Course::create([
                'name' => $name[$i],
                'description' => $description,
                'teacher_id' => 1,
                'price' => rand(100, 500)
            ]);
        }
    }
}
