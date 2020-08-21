<?php

namespace App;

use Course;
use User;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'name', 'image', 'description', 'requirement', 'content',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'course_user');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'target_id')->where('type', Review::TYPE['lesson']);
    }
}
