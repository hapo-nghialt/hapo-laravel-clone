<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $maincourses = Course::orderBy('id', 'asc')->take(3)->get();
        $othercourses = Course::orderBy('id', 'desc')->take(3)->get();
        return view('user.index', compact('maincourses', 'othercourses'));
    }
}
