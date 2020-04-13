@extends('layouts.app')

@section('content')
<div class="container">

    @if($posts->isEmpty())
    <div class="no-posts">
        <h2 class="no-posts mb-3">You can't see any posts yet.</h2>
        <h4 class="no-posts mb-3">Go and follow some people.</h4>
        <a class="btn btn-outline-secondary" href="/users">Users</a>
    </div>
    @else
    @foreach($posts as $post)
    <div class="index-post-card col-md-6 mx-auto mb-4 p-0 border bg-white rounded shadow">
        <div class="py-3 px-2">
            <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle pr-1"
                alt="{{ $post->user->username }}" style="max-width: 35px">
            <span class="font-weight-bold">
                <a class="text-dark" href="/profile/{{ $post->user->id }}">{{ $post->user->username }}</a>
            </span>

        </div>
        <div>
            <a href="/p/{{ $post->id }}">
                <img src="{{ $post->image }}" alt="{{ $post->caption }}" class="w-100">
            </a>
        </div>
        <div class="py-2 px-2">
            <p class="text-justify m-0">
                {{ $post->caption }}
            </p>
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