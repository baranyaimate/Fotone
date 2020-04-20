@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 650px;">
    <form action="/post" enctype="multipart/form-data" method="post">
        @csrf

        <div class="pt-4">
            <h1>New Post</h1>
        </div>

        <div class="form-group">
            <label for="image" class="col-form-label">Image</label>

            <div class="custom-file">
                <input type="file" class="custom-file-input" name="image" id="image" accept="image/*" required>
                <label class="custom-file-label text-truncate" id="custom-file-label" for="image">Choose file</label>
            </div>

            <div class="image-preview rounded" id="imagePreview">
                <img src="" alt="Image Preview" id="image-preview-image" class="image-preview-image rounded">
            </div>

            <strong id="image-upload-error">
                @error('image')
                <strong>{{ $message }}</strong>
                @enderror
            </strong>
        </div>

        <div class="form-group">
            <label for="caption" class="col-form-label">Post caption</label>

            <textarea maxlength="4096" id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" required>{{ old('caption') }}</textarea>

            @error('caption')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="pt-4">
            <button class="btn btn-primary">Upload post</button>
        </div>
    </form>
</div>
@endsection