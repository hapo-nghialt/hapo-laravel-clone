@extends('admin.index')
@section('title','Lesson List')
@section('contents')
<div class="p-3">
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Requirement</th>
                <th>Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lessons as $lesson)
            <tr class="odd gradeX">
                <td>{{ $lesson->id }}</td>
                <td>{{ $lesson->name }}</td>
                <td>{{ $lesson->description }}</td>
                <td>{{ $lesson->requirement }}</td>
                <td>{{ $lesson->time }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
