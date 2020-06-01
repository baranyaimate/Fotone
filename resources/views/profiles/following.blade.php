@extends('layouts.app')

@section('content')
<div class="container">

    <h2><a class="text-dark" href="/user/{{ $user->id }}">{{ $user->username }}</a> following</h2>

    <hr>

    @foreach($following as $current)
        <div class="d-flex align-items-center my-4">
            <div class="col-4">
                <a href="/user/{{ $user->id }}">
                    <img src="{{ $current->profile->profileImage() }}" alt="{{ $current->name }}" class="profile-picture w-100 rounded-circle mr-4" style="max-width: 125px">
                </a>
            </div>

            <div class="col-8 p-0">
                <h3 class="d-inline-block">
                    <a class="no-a-styling d-block" href="/user/{{ $user->id }}">
                        {{ $current->name }}
                    </a>
                    <a class="no-a-styling d-block" href="/user/{{ $user->id }}">
                        <span class="text-muted h5">{{ $current->username }}</span>
                    </a>
                </h3>
                @if($current->id != Auth::user()->id)
                    <following-follow-button user-id="{{ $current->id }}" follows="{{ $follows[$loop->index] }}"></following-follow-button>
                @endif
            </div>

        </div>
        @if(!$loop->last)
            <hr>
        @endif
    @endforeach

    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $following->links() }}
        </div>
    </div>

</div>
@endsection
