@extends('admin.index')
@section('title','Add User')
@section('contents')
<h2 class="m-4 px-2">Add User</h2>
<form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row mx-3">
        <div class="col-6 edit-profile-form">
            <div class="form-group">
                <label class="form-label">Name:</label>
                <input type="text" class="form-control" placeholder="Your name..." name="name" value="{{ old('name') }}">
                @if ($errors->has('name'))
                    <div class="alert alert-danger mt-2">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="form-label">Email:</label>
                <input type="email" class="form-control" placeholder="Your email..." name="email" value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <div class="alert alert-danger mt-2">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="form-label">Password:</label>
                <input type="password" class="form-control" name="password" value="">
                @if ($errors->has('password'))
                    <div class="alert alert-danger mt-2">
                        {{ $errors->first('password') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="form-label">Repeat password:</label>
                <input type="password" class="form-control" name="password_confirmation" value="">
                @if ($errors->has('re-password'))
                    <div class="alert alert-danger mt-2">
                        {{ $errors->first('re-password') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="form-label">Date of birth</label>
                <input type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth') }}">
                @if ($errors->has('date_of_birth'))
                    <div class="alert alert-danger mt-2">
                        {{ $errors->first('date_of_birth') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="form-label">Phone:</label>
                <input type="text" class="form-control" placeholder="Your phone..." name="phone" value="{{ old('phone') }}">
                @if ($errors->has('phone'))
                    <div class="alert alert-danger mt-2">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="col-6 edit-profile-form">
            <div class="form-group">
                <label class="form-label">Address:</label>
                <input type="text" class="form-control" placeholder="Your address..." name="address" value="{{ old('address') }}">
                @if ($errors->has('address'))
                    <div class="alert alert-danger mt-2">
                        {{ $errors->first('address') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="form-label">Avatar:</label>
                <input type="file" class="w-100 mt-1" name="avatar">
                @if ($errors->has('avatar'))
                    <div class="alert alert-danger mt-2">
                        {{ $errors->first('avatar') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="form-label">Role:</label>
                <div class="form-check ml-4">
                    <input class="form-check-input mt-2" type="radio" name="role" id="role-user-1" value="{{ App\Models\User::ROLE['user'] }}" {{ old('role') ==  App\Models\User::ROLE['user'] ? 'checked' : '' }}>
                    <label for="role-user-1" class="form-check-label">User</label>
                </div>
                <div class="form-check ml-4">
                    <input class="form-check-input mt-2" type="radio" name="role" id="role-user-2" value="{{ App\Models\User::ROLE['teacher'] }}" {{ old('role') ==  App\Models\User::ROLE['teacher'] ? 'checked' : '' }}>
                    <label for="role-user-2" class="form-check-label">Teacher</label>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">Introduce:</label>
                <textarea class="form-control" name="introduce" rows="8" placeholder="Introduce yourself...">{{ old('introduce') }}</textarea>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end mt-4 pb-4">
        <a href="{{ route('admin.users.index') }}" type="button" class="btn btn-return">Return</a>
        <button type="submit" class="btn btn-edit-review px-4 mx-4">Add</button>
    </div>
</form>
@endsection
