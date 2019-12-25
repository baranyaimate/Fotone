@extends('layouts.app')

@section('content')
<div class="container">

    <h2>{{ $user->name }} following</h2>

    <hr>
    @foreach($following as $following)
        <div class="d-flex align-items-center my-4">
            <img src="{{ $following->profile->profileImage() }}" alt="" class="w-100 rounded-circle mr-4" style="max-width: 125px">
            <h3>{{ $following->name }} <span class="text-muted h4">({{ $following->username }})</span></h3>
            <following-follow-button user-id="{{ $following->id }}" follows="{{ $following }}"></following-follow-button>
        </div>
        @if(!$loop->last)
            <hr>
        @endif
    @endforeach

</div>
@endsection
