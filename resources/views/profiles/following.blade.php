@extends('layouts.app')

@section('content')
<div class="container">

    <h2><a class="text-dark" href="/profile/{{ $user->id }}">{{ $user->username }}</a> following</h2>

    <hr>

    @foreach($following as $following)
        <div class="d-flex align-items-center my-4">
            <div class="col-4">
                <img src="{{ $following->profile->profileImage() }}" alt="{{ $following->name }}" class="profile-picture w-100 rounded-circle mr-4" style="max-width: 125px">
            </div>

            <div class="col-8">
                <h3 class="d-inline-block"><a class="no-a-styling" href="/profile/{{ $following->id }}">{{ $following->name }} <span class="text-muted h4">({{ $following->username }})</a></span></h3>
                @if($following->id != Auth::user()->id)
                    <following-follow-button user-id="{{ $following->id }}" follows="{{ $follows[$loop->index] }}"></following-follow-button>
                @endif
            </div>

        </div>
        @if(!$loop->last)
            <hr>
        @endif
    @endforeach
</div>
@endsection
