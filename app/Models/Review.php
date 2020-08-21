<?php

namespace App\Models;

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
        if ($this->type == self::TYPE['course']) {
            return $this->belongsTo(Course::class, 'target_id');
        } elseif ($this->type == self::TYPE['lesson']) {
            return $this->belongsTo(Lesson::class, 'target_id');
        }
    }
}
