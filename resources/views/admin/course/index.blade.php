@extends('admin.index')
@section('title','Course List')
@section('contents')
<h2 class="m-3">Course List</h2>
@if (session()->has('message'))
    <div class="alert alert-success m-3">
        {{ session()->get('message') }}
    </div>
@endif
<a href="{{ route('admin.courses.create') }}" class="btn btn-success m-3"><i class="fas fa-plus-square"></i>&nbsp; Add new course</a>
<div class="p-3">
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Price</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
            <tr class="odd gradeX">
                <td>{{ $course->id }}</td>
                <td>{{ $course->name }}</td>
                <td>
                    @if ($course->image == null)
                    <img src="{{ asset('storage/courses/courses.png') }}" alt="" class="rounded-circle" width="50px">
                    @else
                    <img src="{{ asset('storage/courses/' . $course->image) }}" alt="" class="rounded-circle" width="50px">
                    @endif
                </td>
                <td>{{ $course->price }}&nbsp;USD</td>
                <td>{{ $course->description }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
