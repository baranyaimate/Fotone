@extends('layouts.app')

@section('content')
<div class="container">

    <h2>Users <span class="text-muted">({{ $users->count() }})</span></h2>

    <hr>

    @foreach($users as $user)
        <div class="d-flex align-items-center my-4">
            <img src="{{ $user->profile->profileImage() }}" alt="" class="w-100 rounded-circle mr-4" style="max-width: 125px">
            <h3>{{ $user->name }} <span class="text-muted h4">({{ $user->username }})</span></h3>
            <following-follow-button user-id="{{ $user->id }}" follows="{{ $user }}"></following-follow-button>
        </div>
        @if(!$loop->last)
            <hr>
        @endif
    @endforeach

    

</div>
@endsection
