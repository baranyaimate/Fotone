@extends('layouts.app') @section('content')
<div class="container" style="max-width: 900px;">
    <form action="/p/{{ $post->id }}" enctype="multipart/form-data" method="post" 
        class="index-post-card col-md-9 mx-auto mb-4 p-0 border bg-white rounded shadow">
        @csrf
        @method('PATCH')
        <div class="p-3">
            <img src="{{ $post->user->profile->profileImage() }}" class="profile-picture rounded-circle pr-1"
                alt="{{ $post->user->username }}" style="max-width: 45px">
            <span class="font-weight-bold ml-1">
                <a class="text-dark" href="/profile/{{ $post->user->id }}">{{ $post->user->username }}</a>
            </span>
        </div>
        <div>
            <img src="{{ $post->image }}" alt="{{ $post->caption }}" class="w-100">
        </div>
        <div class="p-3">
            <h4>Post caption</h4>
            <textarea style="max-height:100rem;" class="m-0 w-100 form-control @error('caption') is-invalid @enderror" maxlength="4096" type="text" name="caption">{{ $post->caption }}</textarea>
        </div>
        <div class="pb-3 pl-3">
            <input class="btn btn-primary" type="submit" value="Save">
        </div>
    </form>
</div>
@endsection