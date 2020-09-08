<?php

namespace App\Models;

use App\Models\Lesson;
use App\Models\Review;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'image', 'description', 'time', 'price', 'quizze', 'teacher_id',
    ];

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'course_id');
    }

    public function getNumberLessonAttribute()
    {
        return $this->lessons()->count();
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
        return $this->hasMany(Review::class, 'target_id')->where('type', Review::TYPE['course']);
    }
}
