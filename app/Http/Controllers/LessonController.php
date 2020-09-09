<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function show($id) {
        $lesson = Lesson::findOrFail($id);
        return view('user.lesson-detail', compact('lesson'));
    }
}
