@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-sm-3 p-4">
            <img src="{{ $user->profile->profileImage() }}" id="profile-picture" class="rounded-circle w-100 pr-2" alt="{{ $user->username }} profile picture" style="min-width: 70px">
        </div>
        <div class="col-sm-9 pt-4">

            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-2">
                    <div class="h3 mb-0">{{ $user->username }}</div>
                    @cannot('update', $user->profile)
                        <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                    @else
                        <a href="/profile/{{ $user->id }}/edit" class="btn btn-outline-primary ml-4 py-1" style="max-width: 750px">Edit Profile</a>
                    @endcan
                </div>
            </div>

            <div class="d-flex">

                <div class="pr-4 text-center"><strong>{{ $postCount }}</strong>
                    @if($postCount < 2) 
                        post
                    @else
                        posts
                    @endif
                </div>

                <div class="pr-4 text-center">
                    <a href="/profile/{{ $user->id }}/followers" class="no-a-styling">
                        <strong>{{ $followersCount }}</strong> followers
                    </a>
                </div>

                <div class="pr-4 text-center">
                    <a href="/profile/{{ $user->id }}/following" class="no-a-styling">
                        <strong>{{ $followingCount }}</strong> following
                    </a>
                </div>

            </div>

            <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
            <p class="text-justify mb-0">{{ $user->profile->description }}</p>
            <a class="font-weight-bold" href="{{ $user->profile->url }}">{{ $user->profile->url }}</a>

        </div>

    </div>

    <hr>

    <div class="row pt-5">

        @if (!$user->posts->isEmpty())
            @foreach($user->posts as $post)
            <div class="col-md-4 px-3 mb-4">
                <a href="/p/{{ $post->id }}">
                    <img src="{{ $post->image }}" alt="{{ $post->caption }}" class="w-100">
                </a>
                <p class="d-flex d-md-none py-2 text-justify">{{ $post->caption }}</p>
            </div>
            @endforeach
        @else
            <h3 class="text-center w-100">No Posts Yet</h3>
        @endif

    </div>
</div>
@endsection
