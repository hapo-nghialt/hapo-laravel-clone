<?php

namespace App\Models;

use App\Models\User;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'content', 'rate', 'type', 'target_id', 'user_id'
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
