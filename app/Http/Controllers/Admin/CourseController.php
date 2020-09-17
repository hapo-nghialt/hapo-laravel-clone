<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::get();
        return view('admin.course.index', compact('courses'));
    }
    public function create()
    {
        return view('admin.course.add');
    }

    public function store(CourseRequest $request)
    {
        $image = null;
        if ($request->hasFile('image')) {
            $image = uniqid() . "_" . $request->image->getClientOriginalName();
            $request->file('image')->storeAs('public/courses', $image);
        }
        Course::create([
            'name' => $request->name,
            'image' => $image,
            'price' => $request->price,
            'description' => $request->description,
            'teacher_id' => Auth::user()->id,
        ]);
        return redirect()->route('admin.courses.index')->with('message', __('message.create_success'));
    }
}
