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
Route::post('take-course/{id}', 'CourseController@takeCourse')->name('take.course');
Route::post('leave-course/{id}', "CourseController@leaveCourse")->name('leave.course');
Route::post('take-lesson/{id}', 'LessonController@takeLesson')->name('take.lesson');
Route::post('course/review/store/{id}', 'ReviewController@storeCourseReview')->name('review.course.store');
Route::delete('course/review/delete/{id}', 'ReviewController@destroyReview')->name('review.destroy');
Route::post('course/review/update/{id}', 'ReviewController@updateReview')->name('review.update');
Auth::routes();
