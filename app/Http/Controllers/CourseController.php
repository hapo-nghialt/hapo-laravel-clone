<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function showCourseDetail($id)
    {
        $courseDetail = Course::find($id);
        $lessons = $courseDetail->lessons()
            ->paginate(config('variable.pagination-lesson'));
        
        return view('user.course-detail', compact('courseDetail', 'lessons', 'id'));
    }

    public function searchCourseDetail(Request $request, $id)
    {
        $keyword = $request->search;
        $courseDetail = Course::find($id);
        $lessons = $courseDetail->lessons()
            ->where('name', 'like', '%' . $keyword . '%')
            ->paginate(config('variable.pagination-lesson'));
        return view('user.course-detail', compact('courseDetail', 'lessons', 'keyword'));
    }

    public function takeCourse($id)
    {
        $course = Course::findOrFail($id);
        $course->users()->attach(Auth::user()->id);
        return redirect()->route('course.detail', $id);
    }

    public function leaveCourse($id)
    {
        $course = Course::findOrFail($id);
        $course->users()->detach(Auth::user()->id);
        return redirect()->route('course.detail', $id);
    }
}
