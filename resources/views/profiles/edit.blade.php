@extends('layouts.app')

@section('content')
<div class="container mw-650">
    <form action="/user/{{ $user->id }}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')

        <div class="pt-4">
            <h1>Edit Profile</h1>
        </div>

        <div class="form-group">
            <label for="description" class="col-form-label">Description</label>

            <textarea maxlength="4096" id="description" placeholder="Write a description" class="form-control @error('description') is-invalid @enderror"
                name="description">{{ old('description') ?? $user->profile->description }}</textarea>

            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="url" class="col-form-label">URL</label>

            <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url"
                value="{{ old('url') ?? $user->profile->url }}" placeholder="URL">

            @error('url')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="imageInput" class="col-form-label">Profile Image</label>

            <div class="custom-file">
                <input type="file" class="custom-file-input" name="image" id="image" accept="image/*">
                <label class="custom-file-label text-truncate" id="custom-file-label" for="image">Choose file</label>
            </div>

            @if(empty($user->profile->image))
                <div class="image-preview rounded" id="imagePreview">
                    <img src="{{ $user->profile->image }}" alt="Image Preview" id="image-preview-image" class="image-preview-image rounded">
                </div>
            @else
                <div class="image-preview rounded d-block" id="imagePreview">
                    <img src="{{ $user->profile->image }}" alt="Image Preview" id="image-preview-image" class="image-preview-image rounded d-block">
                </div>
            @endif

            <strong id="image-upload-error">
                @error('image')
                <strong>{{ $message }}</strong>
                @enderror
            </strong>
        </div>

        <div class="pt-4">
            <button class="btn btn-primary">Save Profile</button>
        </div>
    </form>
</div>
@endsection