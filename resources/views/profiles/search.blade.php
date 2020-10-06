@extends('layouts.app')

@section('content')
<div class="container">

    <h2>Results <span class="text-muted">({{ $users->total() }})</span></h2>

    <form class="d-flex pt-2">
        <input type="text" class="form-control mr-2" name="q" id="q" placeholder="Search" value="{{ $search }}">
        <button class="btn btn-primary" type="submit" id="searchBtn">Search</button>
    </form>

    <hr>

    @if($users->isEmpty())
        <div class="no-users">
            <h2 class="no-users mb-3">No users found</h2>
        </div>
    @else
        @foreach($users as $user)
            <div class="d-flex align-items-center my-4">

                <div class="col-4">
                    <a href="{{ route('profile.show', $user->id) }}">
                        <img src="{{ $user->profile->profileImage() }}" alt="{{ $user->name }}" class="profile-picture w-100 rounded-circle mr-4 mw-125">
                    </a>
                </div>

                <div class="col-8 p-0">
                    <h3 class="d-inline-block">
                        <a class="no-a-styling d-block" href="{{ route('profile.show', $user->id) }}">
                            {{ $user->name }}
                        </a>
                        <a class="no-a-styling d-block" href="{{ route('profile.show', $user->id) }}">
                            <span class="text-muted h5">{{ $user->username }}</span>
                        </a>
                    </h3>
                    @if($user->id != Auth::user()->id)
                        <following-follow-button user-id="{{ $user->id }}" follows="{{ $follows[$loop->index] }}"></following-follow-button>
                    @endif
                </div>
            </div>
            @if(!$loop->last)
                <hr>
            @endif
        @endforeach
    @endif

    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $users->appends(request()->except('page'))->links() }}
        </div>
    </div>

</div>
@endsection
