<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    public function show($id)
    {
        $courseId = Course::find(Lesson::findOrFail($id)->course_id);
        $teacher = User::find($courseId->teacher_id);
        $lesson = Lesson::findOrFail($id);
        return view('user.lesson-detail', compact('lesson', 'teacher'));
    }

    public function takeLesson($courseId, $lessonId)
    {
        $lesson = Lesson::findOrFail($lessonId);
        $lesson->users()->attach(Auth::user()->id, ['course_id' => $courseId]);
        return view('user.lesson-detail', compact('lesson'));
    }
}
