<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $teachers = User::where('role', User::ROLE['teacher'])->get();
        $tags = Tag::get();
        $courses = Course::latest()->paginate(config('variable.pagination'));
        return view('user.all-courses', compact('courses', 'teachers', 'tags'));
    }

    public function searchCourse(Request $request)
    {
        $teachers = User::where('role', User::ROLE['teacher'])->get();
        $tags = Tag::get();
        $data = $request->all();
        if (isset($data['course_search'])) {
            $keyword = $data['course_search'];
        }
        else $keyword = '';
        $courses = Course::query()->filter($data)->paginate(config('variable.pagination'));
        return view('user.all-courses', compact('courses', 'teachers', 'keyword', 'tags'));
    }

    public function showCourseDetail($id)
    {
        $courseDetail = Course::find($id);
        $lessons = $courseDetail->lessons()
            ->paginate(config('variable.pagination-lesson'));
        $teacher = User::find($courseDetail->teacher_id);
        $rate = config('variable.rate');
        return view('user.course-detail', compact('courseDetail', 'lessons', 'id', 'teacher', 'rate'));
    }

    public function searchCourseDetail(Request $request, $id)
    {
        $keyword = $request->search;
        $courseDetail = Course::find($id);
        $lessons = $courseDetail->lessons()
            ->where('name', 'like', '%' . $keyword . '%')
            ->paginate(config('variable.pagination-lesson'));
        $teacher = User::find($courseDetail->teacher_id);
        $rate = config('variable.rate');
        return view('user.course-detail', compact('courseDetail', 'lessons', 'keyword', 'teacher', 'rate'));
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
