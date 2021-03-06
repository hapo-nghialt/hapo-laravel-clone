<?php

namespace App\Models;

use App\Models\Course;
use App\Models\User;
use App\Models\CourseUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
        return $this->belongsToMany(User::class, 'course_user', 'lesson_id', 'user_id');
    }

    public function userLesson()
    {
        return $this->hasMany(CourseUser::class);
    }

    public function getLessonUserAttribute()
    {
        return $this->userLesson()->count();
    }
    
    public function getCheckUserLearnAttribute()
    {
        $check = [];
        if (Auth::user()) {
            $check = $this->users()->wherePivot("user_id", Auth::user()->id)->get();
        }
        return count($check);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'target_id')->where('type', Review::TYPE['lesson']);
    }
}
