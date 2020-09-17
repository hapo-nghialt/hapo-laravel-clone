<?php

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Tag::create([
        //     'name' => 'HTML',
        // ]);
        // Tag::create([
        //     'name' => 'CSS',
        // ]);
        // Tag::create([
        //     'name' => 'js',
        // ]);
        // Tag::create([
        //     'name' => 'PHP',
        // ]);
        // Tag::create([
        //     'name' => 'code',
        // ]);
        // Tag::create([
        //     'name' => 'learn',
        // ]);
        // Tag::create([
        //     'name' => 'Angular',
        // ]);
        // Tag::create([
        //     'name' => 'developer',
        // ]);
        factory(Tag::class, 50)->create();
    }
}
