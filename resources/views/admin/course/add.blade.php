@extends('admin.index')
@section('title','Add Course')
@section('contents')
<h2 class="m-4 px-2">Add Course</h2>
<form action="{{ route('admin.courses.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row mx-3">
        <div class="col-6 edit-profile-form">
            <div class="form-group">
                <label class="form-label">Name:</label>
                <input type="text" class="form-control" placeholder="Course name..." name="name" value="{{ old('name') }}">
                @if ($errors->has('name'))
                    <div class="alert alert-danger mt-2">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="form-label">Image:</label>
                <input type="file" class="w-100 mt-1" name="image">
                @if ($errors->has('image'))
                    <div class="alert alert-danger mt-2">
                        {{ $errors->first('image') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="form-label">Price:</label>
                <input type="number" class="form-control" placeholder="Course price..." name="price" value="{{ old('price') }}">
                @if ($errors->has('price'))
                    <div class="alert alert-danger mt-2">
                        {{ $errors->first('price') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="col-6 edit-profile-form">
            <div class="form-group">
                <label class="form-label">Description:</label>
                <textarea class="form-control" name="description" rows="8" placeholder="Course description..." value="">{{ old('description') }}</textarea>
                @if ($errors->has('description'))
                    <div class="alert alert-danger mt-2">
                        {{ $errors->first('description') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end mt-4 pb-4">
        <a href="{{ route('admin.courses.index') }}" type="button" class="btn btn-return">Return</a>
        <button type="submit" class="btn btn-edit-review px-4 mx-4">Add</button>
    </div>
</form>
@endsection
