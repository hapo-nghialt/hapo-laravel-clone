@extends('layouts.app')
@section('title','All Courses')
@section('content')
<div class="list-courses container">
    <div class="courses-search d-flex flex-row">
        <form action="{{ route('course.search') }}" method="get" class="d-flex flex-row flex-wrap">
            <div class="d-flex flex-row">
                <a class="btn btn-filter mt-4 ml-1 w-50"><i class="fas fa-sliders-h"></i>&nbsp;Filter</a>
                <input type="text" name="course_search" placeholder="Search..." class="form-control mt-4 ml-3" @if (isset($keyword)) value="{{ $keyword }}" @endif>
                <button type="submit" class="btn icon-search position-relative p-0 mt-4">
                    <i class="fa fa-search"></i>
                </button>
                <button type="submit" class="btn btn-search mt-4 w-50">Tìm kiếm</button>
            </div>
            <div class="filter-course my-3 mx-1 px-2 pt-3 row">
                <div class="col-1 pr-0 pt-2">
                    <span class="text-filter">Lọc theo</span>
                </div>
                <div class="d-flex flex-wrap col-11 p-0">
                    <span class="filter-status d-flex align-items-center justify-content-center mb-2">
                        <input type="radio" hidden id="newest" name="status">
                        <label for="newest" class="mx-2 px-4 py-2">Mới nhất</label>
                    </span>
                    <span class="filter-status d-flex align-items-center justify-content-center mb-2">
                        <input type="radio" hidden id="oldest" name="status">
                        <label for="oldest" class="mx-2 px-4 py-2">Cũ nhất</label>
                    </span>
                    <div class="form-group mx-1 form-filter">
                        <select name="teacher" id="teacher" class="form-control">
                            <option value="" selected>Teacher</option>
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}" @if(request('teacher') == $teacher->id) selected @endif>{{ $teacher->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mx-1 form-filter">
                        <select name="learner" id="learner" class="form-control">
                            <option value="" selected>Số người học</option>
                            <option value="desc" @if(request('learner') == 'desc') selected @endif>Giảm dần</option>
                            <option value="asc" @if(request('learner') == 'asc') selected @endif>Tăng dần</option>
                        </select>
                    </div>
                    <div class="form-group mx-1 form-filter">
                        <select name="time" id="time" class="form-control">
                            <option value="" selected>Thời gian học</option>
                            <option value="desc" @if(request('time') == 'desc') selected @endif>Giảm dần</option>
                            <option value="asc" @if(request('time') == 'asc') selected @endif>Tăng dần</option>
                        </select>
                    </div>
                    <div class="form-group mx-1 form-filter">
                        <select name="lesson" id="lesson" class="form-control">
                            <option value="" selected>Số bài học</option>
                            <option value="desc" @if(request('lesson') == 'desc') selected @endif>Giảm dần</option>
                            <option value="asc" @if(request('lesson') == 'asc') selected @endif>Tăng dần</option>
                        </select>
                    </div>
                    <div class="form-group mx-1 form-filter">
                        <select name="tag" id="tag" class="form-control">
                            <option value="" selected>Tags</option>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}" @if(request('tag') == $tag->id) selected @endif>#{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mx-1 form-filter">
                        <select name="review" id="review" class="form-control">
                            <option value="" selected>Review</option>
                            <option value="desc" @if(request('review') == 'desc') selected @endif>Giảm dần</option>
                            <option value="asc" @if(request('review') == 'asc') selected @endif>Tăng dần</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="row mt-2">
        @foreach ($courses as $item)
        <div class="col-md-6 col-12">
            <div class="courses-item mx-1 my-3">
                <div class="row p-4 courses-item-content">
                    <div class="col-3 pr-0">
                        <a href="{{ route('course.detail', $item->id) }}"><img src="images/courses-HTML.png" alt="" class="rounded-circle w-75"></a>
                    </div>
                    <div class="col-9 p-0">
                        <div class="courses-title">
                            <a href="{{ route('course.detail', $item->id) }}">{{ $item->name }}</a>
                        </div>
                        <div class="courses-desc mt-2 pr-4">
                            {{ $item->description }}
                        </div>
                        <div class="d-flex justify-content-end mr-4 mt-3">
                            <a href="{{ route('course.detail', $item->id) }}"><button class="btn btn-more px-4">More</button></a>
                        </div>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-xl-4 py-3">
                        <p class="m-0">Learners</p><b>{{ $item->course_user }}</b>
                    </div>
                    <div class="col-xl-4 py-3">
                        <p class="m-0">Lessons</p><b>{{ $item->number_lesson }}</b>
                    </div>
                    <div class="col-xl-4 py-3">
                        <p class="m-0">Times</p><b>{{ $item->time_lesson }} (h)</b>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="pagination-custom d-flex justify-content-end">
        {{ $courses->appends($_GET)->links() }}
    </div>
</div>
@endsection
