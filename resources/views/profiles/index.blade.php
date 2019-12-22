@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-4">
            <img src="{{ $user->profile->profileImage() }}" class="rounded-circle w-100" alt="">
        </div>
        <div class="col-9 pt-4">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-2">
                    <div class="h3">{{ $user->username }}</div>
                    <button class="btn btn-primary ml-4">Follow</button>
                </div>

                @can('update', $user->profile)
                    <a href="/p/create" class="font-weight-bold">Add New Post</a>
                @endcan
            </div>
            @can('update', $user->profile)
                <a href="/profile/{{ $user->id }}/edit" class="font-weight-bold">Edit Profile</a>
            @endcan
            <div class="d-flex">
                <div class="pr-4"><strong>{{ $user->posts->count() }}</strong> posts</div>
                <div class="pr-4"><strong>23k</strong> followers</div>
                <div class="pr-4"><strong>212</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <div><a class="font-weight-bold" href="{{ $user->profile->url }}">{{ $user->profile->url }}</a></div>
        </div>
    </div>

    <div class="row pt-5">
        @foreach($user->posts as $post)
        <div class="col-4 pb-4">
            <a href="/p/{{ $post->id }}">
                <img src="/storage/{{ $post->image }}" alt="{{ $post->caption }}" class="w-100">
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
