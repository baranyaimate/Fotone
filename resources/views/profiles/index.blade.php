@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="p-2 w-100">
            <img class="profile-picture d-block m-auto rounded-circle mw-70" src="{{ $user->profile->profileImage() }}" id="profile-picture" alt="{{ $user->name }}">
        </div>
    </div>
    <div class="row">
        <div class="pt-2 w-100">
            <div class="pb-2">
                <h3 class="text-center h3">{{ $user->username }}</h3>
            </div>

            <div class="row justify-content-center">

                <div class="col-lg-2 col-3 text-center card simple-text mx-2 py-2"><strong>{{ $postCount }}</strong>
                    @if($postCount <= 1) 
                        post
                    @else
                        posts
                    @endif
                </div>

                <div class="col-lg-2 col-3 text-center card mx-2 py-2">
                    <a href="{{ route('profile.showFollowers', $user->id) }}" class="no-a-styling">
                        <strong>{{ $followersCount }}</strong><br>followers
                    </a>
                </div>

                <div class="col-lg-2 col-3 text-center card mx-2 py-2">
                    <a href="{{ route('profile.showFollowing', $user->id) }}" class="no-a-styling">
                        <strong>{{ $followingCount }}</strong><br>following
                    </a>
                </div>

            </div>

            <p class="text-center mx-auto my-3 mw-650 ">{{ $user->profile->description }}</p>
            <a class="text-center d-block font-weight-bold" href="{{ $user->profile->url }}">{{ $user->profile->url }}</a>

        </div>

    </div>

    @cannot('update', $user->profile)
        <div class="follow-button">
            <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
        </div>
    @endcan

    <hr>

    @if (!$user->posts->isEmpty())
        @foreach($user->posts->chunk(3) as $chunk)
            <div class="row">
                @foreach($chunk as $post)
                    <div class="col-md-4">
                        <div class="p-0 my-3 border bg-white rounded shadow profile-post-card">
                            <a href="{{ route('post.show', $post->id) }}">
                                <div class="img-placeholder">
                                    <img src="{{ $post->image }}" alt="{{ $post->caption }}" class="w-100 rounded">
                                </div>
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
        <h3 class="text-center w-100 my-5">No posts yet</h3>
    @endif
</div>
@endsection
