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
        for ($j = 5; $j < 10; $j++) { 
            for ($i = 1; $i < 50; $i = $i + 5) { 
                CourseTag::create([
                    'tag_id' => $j,
                    'course_id' => $i + rand(0, 5),
                ]);
            }
        }
        
        // CourseTag::create([
        //     'tag_id' => 1,
        //     'course_id' => 1,
        // ]);
    }
}
