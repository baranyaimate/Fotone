@extends('layouts.app') @section('content')
<div class="container mw-900">
    <form action="/post/{{ $post->id }}" method="post"
        class="index-post-card col-md-9 mx-auto mb-4 p-0 border bg-white rounded shadow">
        @csrf
        @method('PATCH')
        <div class="p-3">
            <img src="{{ $post->user->profile->profileImage() }}" class="profile-picture rounded-circle pr-1 mw-45" alt="{{ $post->user->username }}">
            <div class="d-inline-block align-middle ml-1">
                <a class="text-dark font-weight-bold" href="{{ route('profile.show', $post->user->id) }}">{{ $post->user->username }}</a>
                <br>
                <time datetime="{{ $post->created_at }}" class="text-muted d-block mt-n1">{{ $post->getTimeAgo($post->created_at) }}</time>
            </div>
        </div>
        <div>
            <div class="img-placeholder">
                <img src="{{ $post->image }}" alt="{{ $post->caption }}" class="w-100">
            </div>
        </div>
        <div class="p-3">
            <label id="post-caption-label" for="post-caption-textarea">Post caption</label>
            <textarea id="post-caption-textarea" class="m-0 w-100 form-control @error('caption') is-invalid @enderror"
                maxlength="4096" name="caption" placeholder="Write a caption">{{ $post->caption }}</textarea>
        </div>
        <div class="pb-3 pl-3">
            <input class="btn btn-primary" type="submit" value="Save">
            <a class="btn btn-outline-secondary ml-1" href="{{ route('post.show', $post->id) }}">Cancel</a>
            <a class="btn btn-outline-danger mr-3 float-right" href="" data-toggle="modal" data-target="#confirmDeleteModal">Delete</a>
        </div>
    </form>

    <!-- Confirm delete modal -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Delete post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this post?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger" onClick="window.location.href='{{ route('post.delete', $post->id) }}'">Yes</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection