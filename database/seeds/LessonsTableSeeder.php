<?php

use App\Models\Lesson;
use Illuminate\Database\Seeder;

class LessonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = rand(100, 200);
        factory(Lesson::class, $i)->create();
    }
}
