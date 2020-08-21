<?php

namespace App;

use Course;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'id', 'name',
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
}
