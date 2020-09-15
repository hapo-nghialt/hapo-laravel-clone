<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Review;
use App\Models\Lesson;
use App\Models\CourseUser;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable,
        SoftDeletes;

    const ROLE = [
        'user' => 0,
        'teacher' => 1,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'address', 'role', 'date_of_birth', 'introduce', 'phone', 'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'user_id');
    }

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class, 'course_user', 'user_id', 'lesson_id');
    }

    public function userCourse()
    {
        return $this->hasMany(CourseUser::class);
    }

    public function lessonLearned()
    {
        return $this->courses()->wherePivot('lesson_id', null)->get();
    }
}
