@extends('layouts.app')
@section('title')
    Profile
@endsection
@section('content')
<div class="container hapo-profile-user">
    <div class="row">
        <div class="col-3">
            <div class="avatar-user d-flex flex-column justify-content-center mt-5">
                @if ($user->avatar == null)
                    <img src="{{ asset('storage/users/default.png') }}" class="rounded-circle" alt="">
                @else                    
                    <img src="{{ asset('storage/users/' . $user->avatar) }}" class="rounded-circle" alt="">
                @endif
                    <a data-toggle="modal" data-target="#uploadAvatar" class="btn btn-image position-relative"><i class="fas fa-camera"></i></a>
                @if ($errors->has('avatar'))
                    <div class="alert alert-danger mt-4">
                        {{ $errors->first('avatar') }}
                    </div>
                @endif
            </div>
            <div id="uploadAvatar" class="modal fade upload-avatar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('upload.avatar.user', Auth::user()->id) }}" enctype="multipart/form-data" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Upload avatar</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <input type="file" name="avatar" id="avatar">
                                <label for="avatar">
                                    <i class="fas fa-cloud-upload-alt icon-upload"></i>
                                </label>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-edit-review">Upload</button>
                                <button type="button" class="btn btn-return" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="profile-user text-center mt-3">
                <div class="user-name">{{ $user->name }}</div>
                <div class="user-email py-2">{{ $user->email }}</div>
            </div>
            <hr>
            <div class="infomation-user-profile text-justify">
                <div class="mx-3">
                    <i class="fas fa-birthday-cake pr-3"></i><span>{{ date('d-m-Y', strtotime($user->date_of_birth)) }}</span>
                    <hr>
                    <i class="fas fa-phone pr-3"></i><span>{{ $user->phone }}</span>
                    <hr>
                    <i class="fas fa-home pr-3"></i><span>{{ $user->address }}</span>
                    <hr>
                </div>
                <span class="introduce-user">{{ $user->introduce }}</span>
                
            </div>
        </div>
        <div class="col-9 mt-5">
            <div class="hapo-edit-profile container">
                @if ($user->getIsTeacherAttribute())
                <div class="title">
                    My courses                    
                </div>
                <div class="row my-4 d-flex justify-content-center align-items-center">
                    @foreach ($courses->lessonLearned() as $course)
                    <div class="col-1 list-courses-learned p-0 text-center mx-3">
                        <a href="{{ route('course.detail', $course->id) }}"><img src="{{ asset('storage/courses/courses-HTML.png') }}" class="rounded-circle mb-2" alt="">{{ $course->name }}</a>
                    </div>
                    @endforeach
                    <div class="add-new-course mx-3">
                        <a href="{{ route('admin.courses.create') }}">
                            <div class="icon-add-course mb-2 d-flex align-items-center justify-content-center">
                                +
                            </div>
                            Add course
                        </a>
                    </div>
                </div>
                @else
                <div class="title">
                    My courses                    
                </div>
                <div class="row my-4 d-flex justify-content-center align-items-center">
                    @foreach ($courses->lessonLearned() as $course)
                    <div class="col-1 list-courses-learned p-0 text-center mx-3">
                        <a href="{{ route('course.detail', $course->id) }}">
                            @if ($course->image == null)
                            <img src="{{ asset('storage/courses/courses.png') }}" alt="" class="rounded-circle mb-2">
                            @else
                            <img src="{{ asset('storage/courses/' . $course->image) }}" alt="" class="rounded-circle mb-2">
                            @endif
                            {{ $course->name }}
                        </a>
                    </div>
                    @endforeach
                    <div class="add-new-course mx-3">
                        <a href="{{ route('course') }}">
                            <div class="icon-add-course mb-2 d-flex align-items-center justify-content-center">
                                +
                            </div>
                            Add course
                        </a>
                    </div>
                </div>
                @endif
                <div class="title">
                    Edit profile
                </div>
                @if (session()->has('message'))
                    <div class="alert alert-success mt-4">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <form action="{{ route('user.update') }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-6 edit-profile-form">
                            <div class="form-group mt-4">
                                <label class="form-label">Name:</label>
                                <input type="text" class="form-control" placeholder="Your name..." name="name" value="{{ old('name', $user->name) }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Date of birthday:</label>
                                <input type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth', $user->date_of_birth) }}">
                                @if ($errors->has('date_of_birth'))
                                    <div class="alert alert-danger mt-4">
                                        {{ $errors->first('date_of_birth') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="form-label">Address:</label>
                                <input type="text" class="form-control" placeholder="Your address..." name="address" value="{{ old('address', $user->address) }}">
                                @if ($errors->has('address'))
                                    <div class="alert alert-danger mt-4">
                                        {{ $errors->first('address') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-6 edit-profile-form">
                            <div class="form-group mt-4">
                                <label class="form-label">Email:</label>
                                <input type="text" class="form-control" placeholder="Your email..." name="email" value="{{ old('email', $user->email) }}" disabled>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Phone:</label>
                                <input type="text" class="form-control" placeholder="Your phone..." name="phone" value="{{ old('phone', $user->phone) }}">
                                @if ($errors->has('phone'))
                                    <div class="alert alert-danger mt-4">
                                        {{ $errors->first('phone') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="form-label">About me:</label>
                                <textarea class="form-control" name="introduce" rows="7" placeholder="About you...">{{ old('introduce', $user->introduce) }}</textarea>
                                @if ($errors->has('introduce'))
                                    <div class="alert alert-danger mt-4">
                                        {{ $errors->first('introduce') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-4 pb-4">
                        <button type="submit" class="btn btn-edit-profile px-4">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="blank-space"></div>
@endsection
