@extends('layouts.app')

@section('content')
<div class="container">

    <h2>{{ $user->name }} followers</h2>

    <hr>
    @foreach($followers as $followers)
        <div class="d-flex align-items-center my-4">
            <img src="{{ $followers->profile->profileImage() }}" alt="" class="w-100 rounded-circle mr-4" style="max-width: 125px">
            <h3>{{ $followers->name }} <span class="text-muted h4">({{ $followers->username }})</span></h3>
        </div>
        @if(!$loop->last)
            <hr>
        @endif
    @endforeach

</div>
@endsection
