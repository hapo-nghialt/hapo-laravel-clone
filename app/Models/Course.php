<?php

namespace App\Models;

use App\Models\User;
use App\Models\Lesson;
use App\Models\Review;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

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

    public function getTimeLessonAttribute()
    {
        return $this->lessons()->sum('time');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function userCourse()
    {
        return $this->hasMany(CourseUser::class);
    }

    public function getCourseUserAttribute()
    {
        return $this->userCourse()->distinct('user_id')->count();
    }

    public function getCheckUserAttribute()
    {
        $check = [];
        if (Auth::user())
            {
                $check = $this->users()->wherePivot("user_id", Auth::user()->id)->get();
            }
        return count($check);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'target_id')->where('type', Review::TYPE['course']);
    }
}
