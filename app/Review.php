<?php

namespace App;

use User;
use Course;
use Lesson;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'content', 'rate', 'type', 'target_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'target_id')->wherePivot('type', 0);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'target_id')->wherePivot('type', 1);
    }
}
