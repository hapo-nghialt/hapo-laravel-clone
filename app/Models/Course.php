<?php

namespace App\Models;

use App\Models\User;
use App\Models\Lesson;
use App\Models\Review;
use App\Models\Tag;
use App\Models\CourseUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Course extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'image', 'description', 'price', 'quizze', 'teacher_id',
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

    public function lessonLearned()
    {
        return $this->userCourse()->where('lesson_id', '=', '0')->distinct('lesson_id');
    }

    public function getCourseUserAttribute()
    {
        return $this->userCourse()->distinct('user_id')->count();
    }

    public function getCheckUserAttribute()
    {
        $check = [];
        if (Auth::user()) {
            $check = $this->users()->wherePivot("user_id", Auth::user()->id)->get();
        }
        return count($check);
    }

    public function getOtherCourses()
    {
        return $this->where('id', '!=', $this->id)
            ->take(config('variable.other-courses'))
            ->get();
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'target_id')->where('type', Review::TYPE['course']);
    }

    public function getCourseReviewAttribute()
    {
        return $this->reviews()->count();
    }

    public function getCourseReviewAverageAttribute()
    {
        return floor($this->reviews()->avg('rate') * 10) / 10;
    }

    public function getNumberVote($star)
    {
        return $this->reviews()->where('rate', $star)->count();
    }

    public function getPercentRateCourse($star)
    {
        if ($this->reviews()->count() != 0) {
            $totalStar = $this->reviews()->count();
            $numberStar = $this->getNumberVote($star);
            $percent = floor($numberStar / $totalStar * 10000) / 100;
        } else {
            $percent = 0;
        }
        return $percent;
    }

    public function scopeFilter($query, $data)
    {
        $result = null;

        if ($data['course_search']) {
            $query->where('name', 'like', '%' . $data['course_search'] . '%')
                ->orWhere('description', 'like', '%' . $data['course_search'] . '%');
        }

        if ($data['teacher']) {
            $query->where('teacher_id', $data['teacher']);
        }

        if ($data['learner']) {
            if ($data['learner'] == 'desc') {
                $query->withCount(['users' => function ($subquery) {
                    $subquery->where('lesson_id', null);
                }])->orderByDesc('users_count');
            } else {
                $query->withCount(['users' => function ($subquery) {
                    $subquery->where('lesson_id', null);
                }])->orderBy('users_count');
            }
        }

        if ($data['time']) {
            if ($data['time'] == 'desc') {
                $query->addSelect(['time' => Lesson::selectRaw('sum(time) as total')
                    ->whereColumn('course_id', 'courses.id')
                    ->groupBy('course_id')
                ])->orderByDesc('time');
            } else {
                $query->addSelect(['time' => Lesson::selectRaw('sum(time) as total')
                    ->whereColumn('course_id', 'courses.id')
                    ->groupBy('course_id')
                ])->orderBy('time');
            }
        }

        if ($data['lesson']) {
            if ($data['lesson'] == 'desc') {
                $query->withCount('lessons')->orderByDesc('lessons_count');
            } else {
                $query->withCount('lessons')->orderBy('lessons_count');
            }
        }

        if ($data['review']) {
            if ($data['review'] == 'desc') {
                $query->addSelect(['rate' => Review::selectRaw('sum(rate) as total')
                    ->where('type', 0)->whereColumn('target_id', 'courses.id')
                    ->groupBy('target_id')
                ])->orderByDesc('rate');
            } else {
                $query->addSelect(['rate' => Review::selectRaw('sum(rate) as total')
                    ->where('type', 0)->whereColumn('target_id', 'courses.id')
                    ->groupBy('target_id')
                ])->orderBy('rate');
            }
        }

        if ($data['tag']) {
            $query->whereHas('tags', function ($subquery) use ($data) {
                $subquery->where('tag_id', $data['tag']);
            });
        }

        return $result;
    }
}
