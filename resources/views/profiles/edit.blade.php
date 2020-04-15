@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 650px">
    <form action="/profile/{{ $user->id }}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')

        <div class="pt-4">
            <h1>Edit Profile</h1>
        </div>

        <div class="form-group">
            <label for="title" class="col-form-label">Title</label>

            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                value="{{ old('title') ?? $user->profile->title }}">

            @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="description" class="col-form-label">Description</label>

            <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror"
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
                value="{{ old('url') ?? $user->profile->url }}">

            @error('url')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="imageInput" class="col-form-label">Profile Image</label>

            <div class="custom-file">
                <input type="file" class="custom-file-input" name="image" id="image">
                <label class="custom-file-label" id="custom-file-label" for="image">Choose file</label>
            </div>

            @if(empty($user->profile->image))
                <div class="image-preview rounded" id="imagePreview">
                    <img src="{{ $user->profile->image }}" alt="Image Preview" id="image-preview-image" class="image-preview-image rounded">
                </div>
            @else
                <div class="image-preview rounded" id="imagePreview" style="display: block">
                    <img src="{{ $user->profile->image }}" alt="Image Preview" id="image-preview-image" class="image-preview-image rounded" style="display: block">
                </div>
            @endif

            @error('image')
            <strong>{{ $message }}</strong>
            @enderror
        </div>

        <div class="pt-4">
            <button class="btn btn-primary">Save Profile</button>
        </div>
    </form>
</div>
@endsection