<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::latest()->paginate(config('variable.pagination'));
        return view('user.all-courses', compact('courses'));
    }

    public function searchCourse(Request $request)
    {
        $keyword = $request->course_search;
        $courses = Course::where('name', 'like', '%' . $keyword . '%')
                        ->orWhere('description', 'like', '%' . $keyword . '%')
                        ->paginate(config('variable.pagination'));
        return view('user.all-courses', compact('courses', 'keyword'));
    }
}
