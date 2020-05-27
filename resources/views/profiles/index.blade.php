@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="p-2 w-100">
            <img class="profile-picture d-block m-auto rounded-circle" src="{{ $user->profile->profileImage() }}" id="profile-picture" alt="{{ $user->name }}" style="min-width: 70px">
        </div>
    </div>
    <div class="row">
        <div class="pt-4 w-100">
            <div class="pb-2">
                <h3 class="text-center h3">{{ $user->username }}</h3>
                @cannot('update', $user->profile)
                    <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                @else
                    <button class="d-block m-auto btn btn-outline-primary py-1" onclick="location.href='/user/{{ $user->id }}/edit'">Edit Profile</button>
                @endcan
            </div>

            <div class="d-flex justify-content-center">

                <div class="mx-2 text-center simple-text"><strong>{{ $postCount }}</strong>
                    @if($postCount <= 1) 
                        post
                    @else
                        posts
                    @endif
                </div>

                <div class="mx-2 text-center">
                    <a href="/user/{{ $user->id }}/followers" class="no-a-styling">
                        <strong>{{ $followersCount }}</strong> followers
                    </a>
                </div>

                <div class="mx-2 text-center">
                    <a href="/user/{{ $user->id }}/following" class="no-a-styling">
                        <strong>{{ $followingCount }}</strong> following
                    </a>
                </div>

            </div>

            <div class="pt-4 text-center font-weight-bold profile-title-text">{{ $user->profile->title }}</div>
            <p class="text-center mb-0">{{ $user->profile->description }}</p>
            <a class="text-center d-block font-weight-bold" href="{{ $user->profile->url }}">{{ $user->profile->url }}</a>

        </div>

    </div>

    <hr>
    @if (!$user->posts->isEmpty())
        @foreach($user->posts->chunk(3) as $chunk)
            <div class="row">
                @foreach($chunk as $post)
                    <div class="col-md-4">
                        <div class="p-0 my-3 border bg-white rounded shadow profile-post-card">
                            <a href="/post/{{ $post->id }}">
                                <img src="{{ $post->image }}" alt="{{ $post->caption }}" class="w-100 rounded">
                            </a>
                            <div class="d-md-none py-2 px-2">
                                <p class="d-flex d-md-none py-2 text-justify m-0">{{ $post->caption }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    @else
        <h3 class="text-center w-100">No posts yet</h3>
    @endif
</div>
@endsection
