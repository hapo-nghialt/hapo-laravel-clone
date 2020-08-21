<?php

namespace App;

use Lesson;
use Review;
use Tag;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name', 'image', 'description', 'time', 'price', 'quizze', 'teacher_id',
    ];

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'course_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'target_id')->where('type', 0);
    }
}
