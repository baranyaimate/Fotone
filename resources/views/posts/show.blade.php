@extends('layouts.app') @section('content')
<div class="container" style="max-width: 900px;">
    <div class="index-post-card col-md-9 mx-auto mb-4 p-0 border bg-white rounded shadow">
        <div class="p-3">
            <img src="{{ $post->user->profile->profileImage() }}" class="profile-picture rounded-circle pr-1"
                alt="{{ $post->user->username }}" style="max-width: 45px">
            <span class="font-weight-bold ml-1">
                <a class="text-dark" href="/user/{{ $post->user->id }}">{{ $post->user->username }}</a>
            </span>
            @if($post->user->id == Auth::user()->id)
                <a class="btn btn-outline-primary float-right" style="margin-top: 2px;" href="/post/{{ $post->id }}/edit#post-caption-label">
                    Edit
                </a>
            @endif
        </div>
        <div>
            <img src="{{ $post->image }}" alt="{{ $post->caption }}" class="w-100">
        </div>
        <div class="p-3">
            <p class="text-justify m-0">{{ $post->caption }}</p>
        </div>
    </div>
</div>
@endsection