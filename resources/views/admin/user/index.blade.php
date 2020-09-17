@extends('admin.index')
@section('title','User List')
@section('contents')
<h2 class="m-3">User List</h2>
@if (session()->has('message'))
    <div class="alert alert-success m-3">
        {{ session()->get('message') }}
    </div>
@endif
<a href="{{ route('admin.users.create') }}" class="btn btn-success m-3"><i class="fas fa-plus-square"></i>&nbsp; Add new course</a>
<div class="p-3">
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Date of birth</th>
                <th>Phone</th>
                <th>Avatar</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr class="odd gradeX" align="center">
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->date_of_birth }}</td>
                <td>{{ $user->phone }}</td>
                <td>
                    @if ($user->avatar == null)
                    <img src="{{ asset('storage/users/default.png') }}" alt="" class="rounded-circle" width="50px">
                    @else
                    <img src="{{ asset('storage/users/' . $user->avatar) }}" alt="" class="rounded-circle" width="50px">
                    @endif
                </td>
                <td>{{ $user->address }}</td>
                <td>
                    <a href="{{ route('admin.users.edit', $user->id) }}"><i class="far fa-edit"></i></a>
                    <a href=""><i class="fas fa-trash-alt"></i></a>
                </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
