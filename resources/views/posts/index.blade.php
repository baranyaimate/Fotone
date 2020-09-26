@extends('layouts.app')

@section('content')
<div class="container">

    @if($posts->isEmpty())
    <div class="no-posts">
        <h2 class="no-posts mb-3">You can't see any posts yet.</h2>
        <h4 class="no-posts mb-3">Go and follow some people.</h4>
        <a class="btn btn-outline-primary" href="{{ route('listUsers') }}">Users</a>
    </div>
    @else
    @foreach($posts as $post)
    <div class="index-post-card col-md-6 mx-auto my-4 p-0 border bg-white rounded shadow">

        <div class="p-3 d-flex justify-content-between">
            <div>
                <img src="{{ $post->user->profile->profileImage() }}" class="profile-picture rounded-circle pr-1 mw-45" alt="{{ $post->user->username }}">
                <div class="d-inline-block align-middle ml-1">
                    <a class="text-dark" href="{{ route('profile.show', ['user' => $post->user->id]) }}">{{ $post->user->username }}</a>
                    <br>
                    <time datetime="{{ $post->created_at }}" class="text-muted d-block mt-n1">{{ $post->getTimeAgo($post->created_at) }}</time>
                </div>
            </div>
            @if($post->user->id == Auth::user()->id)
                <a class="btn btn-outline-primary d-flex align-self-center" href="{{ route('post.edit', ['post' => $post->id]) }}#post-caption-label">
                    Edit
                </a>
            @endif
        </div>

        <div>
            <a href="{{ route('post.show', ['post' => $post->id]) }}">
                <img src="{{ $post->image }}" alt="{{ $post->caption }}" class="w-100">
            </a>
        </div>

        <div class="py-2 px-2">
            <p class="text-justify m-0 hide-long-text">{{ $post->caption }}</p>
        </div>

    </div>
    @endforeach
    @endif

    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>

</div>
@endsection
