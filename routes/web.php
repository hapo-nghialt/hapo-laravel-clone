<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');
Route::get('/courses', 'CourseController@index')->name('course');
Route::get('/search-course', 'CourseController@searchCourse')->name('course.search');
Route::get('/course-detail/{id}', 'CourseController@showCourseDetail')->name('course.detail');
Route::get('/lesson-detail/{id}', 'LessonController@show')->name('lesson.detail');
Route::get('/search-course-detail/{id}', 'CourseController@searchCourseDetail')->name('course.detail.search');
Auth::routes();
