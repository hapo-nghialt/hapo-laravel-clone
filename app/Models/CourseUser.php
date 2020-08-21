<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseUser extends Model
{
    protected $fillable = ['id', 'course_id', 'user_id'];
}
