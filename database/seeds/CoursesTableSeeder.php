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
        $description = 'I knew hardly anything about HTML, JS, and CSS before entering New Media. 
        I had coded quite a bit, but never touched anything in regards to web development.';

        $name = [
            'HTML/CSS/js Tutorial',
            'Laravel Tutorial',
            'PHP Tutorial',
            'CSS Tutorial',
            'Ruby on rails Tutorial',
            'Java Tutorial',
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
