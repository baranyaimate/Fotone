@extends('layouts.app')

@section('content')
<div class="container">

    <h2><a class="text-dark" href="/user/{{ $user->id }}">{{ $user->username }}</a> followers</h2>

    <hr>

    @foreach($followers as $follower)
        <div class="d-flex align-items-center my-4">
            <div class="col-4">
                <a href="/user/{{ $user->id }}">
                    <img src="{{ $follower->profile->profileImage() }}" alt="{{ $user->name }}" class="profile-picture w-100 rounded-circle mr-4" style="max-width: 125px">
                </a>
            </div>

            <div class="col-8 p-0">
                <h3 class="d-inline-block">
                    <a class="no-a-styling d-block" href="/user/{{ $user->id }}">
                        {{ $follower->name }}
                    </a>
                    <a class="no-a-styling d-block" href="/user/{{ $user->id }}">
                        <span class="text-muted h5">{{ $follower->username }}</span>
                    </a>
                </h3>
                @if($follower->id != Auth::user()->id)
                    <following-follow-button user-id="{{ $follower->id }}" follows="{{ $follows[$loop->index] }}"></following-follow-button>
                @endif
            </div>
        </div>
        @if(!$loop->last)
            <hr>
        @endif
    @endforeach

    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $followers->links() }}
        </div>
    </div>

</div>
@endsection