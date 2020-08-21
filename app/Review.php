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

    const TYPE = [
        'course' => 0,
        'lesson' => 1,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function target()
    {
        if ('type' == 0) {
            return $this->belongsTo(Course::class, 'target_id');
        } elseif ('type' == 1) {
            return $this->belongsTo(Lesson::class, 'target_id');
        }
    }
}
