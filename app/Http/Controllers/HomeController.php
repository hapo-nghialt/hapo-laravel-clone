<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use App\Models\Lesson;

class HomeController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        $lessons = Lesson::all();
        $learners = User::all();
        $mainCourses = Course::orderBy('id', 'asc')->take(3)->get();
        $otherCourses = Course::orderBy('id', 'desc')->take(3)->get();
        $reviews = Review::orderBy('rate', 'desc')->take(10)->get();
        $rate = config('variable.rate');
        return view('user.index')
            ->with(compact('courses', 'lessons', 'learners', 'mainCourses', 'otherCourses', 'reviews', 'rate'));
    }
}
