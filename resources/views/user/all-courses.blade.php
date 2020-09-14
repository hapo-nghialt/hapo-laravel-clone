@extends('layouts.app')
@section('title','All Courses')
@section('content')
<div class="list-courses container">
    <div class="courses-search d-flex flex-row">
        <a href="" class="btn btn-filter mt-4 ml-1"><i class="fas fa-sliders-h"></i>&nbsp;Filter</a>
        <form action="{{ route('course.search') }}" method="get" class="w-50 d-flex flex-row">
            <input type="text" name="course_search" placeholder="Search..." class="form-control mt-4 ml-3" @if (isset($keyword)) value="{{ $keyword }}" @endif>
            <button type="submit" class="btn icon-search position-relative p-0 mt-4">
                <i class="fa fa-search"></i>
            </button>
            <button type="submit" class="btn btn-search mt-4 w-25">Tìm kiếm</button>
        </form>
    </div>
    <div class="row mt-2">
        @foreach ($courses as $item)
        <div class="col-md-6 col-12">
            <div class="courses-item mx-1 my-3">
                <div class="row p-4 courses-item-content">
                    <div class="col-3 pr-0">
                        <img src="images/courses-HTML.png" alt="" class="rounded-circle w-75">
                    </div>
                    <div class="col-9 p-0">
                        <div class="courses-title">
                            {{ $item->name }}
                        </div>
                        <div class="courses-desc mt-2 pr-4">
                            {{ $item->description }}
                        </div>
                        <div class="d-flex justify-content-end mr-4 mt-3">
                            @if (Auth::check())
                                <form action="{{ route('course.detail', $item->id) }}" method="GET">
                                    <button class="btn btn-more px-4">More</button>
                                </form>
                            @else
                                <a data-target="#myModal" data-toggle="modal" href="#" class="btn btn-more w-25">More</a>
                            @endif
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
