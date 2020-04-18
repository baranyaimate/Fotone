@extends('layouts.app')

@section('title', " | Users")

@section('content')
<div class="container">

    <h2>Users <span class="text-muted">({{ $users->total() }})</span></h2>

    <form class="d-flex pt-2" action="/search">
        <input type="text" class="form-control mr-2" name="q" id="q" placeholder="Search">
        <button class="btn btn-primary" type="submit" id="searchBtn">Search</button>
    </form>

    <hr>

    @foreach($users as $user)
        <div class="d-flex align-items-center my-4">
            <div class="col-4">
                <img src="{{ $user->profile->profileImage() }}" alt="{{ $user->name }}" class="profile-picture w-100 rounded-circle mr-4" style="max-width: 125px">
            </div>

            <div class="col-8">
                <h3 class="d-inline-block"><a class="no-a-styling" href="/profile/{{ $user->id }}">{{ $user->name }} <span class="text-muted h4">({{ $user->username }})</a></span></h3>
                @if($user->id != Auth::user()->id)
                    <following-follow-button user-id="{{ $user->id }}" follows="{{ $follows[$loop->index] }}"></following-follow-button>
                @endif
            </div>
        </div>
        @if(!$loop->last)
            <hr>
        @endif
    @endforeach

    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $users->links() }}
        </div>
    </div>

</div>
@endsection
