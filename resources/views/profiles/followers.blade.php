@extends('layouts.app')

@section('content')
<div class="container">

    <h2>{{ $user->name }} followers</h2>

    <hr>

    @foreach($followers as $follower)
        <div class="d-flex align-items-center my-4">
            <img src="{{ $follower->profile->profileImage() }}" alt="" class="w-100 rounded-circle mr-4" style="max-width: 125px">
            <h3><a class="no-a-styling" href="/profile/{{ $follower->id }}">{{ $follower->name }} <span class="text-muted h4">({{ $follower->username }})</a></span></h3>
            @if($follower->id != Auth::user()->id)
                <following-follow-button user-id="{{ $follower->id }}" follows="{{ $follows[$loop->index] }}"></following-follow-button>
            @endif
        </div>
        @if(!$loop->last)
            <hr>
        @endif
    @endforeach

</div>
@endsection
