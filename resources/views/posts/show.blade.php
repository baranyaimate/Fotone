@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-8">
            <img src="{{ $post->image }}" alt="{{ $post->caption }}" class="w-100">
        </div>
        <div class="col-4">
            <div>
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <img src="{{ $post->user->profile->profileImage() }}" alt="" class="w-100 rounded-circle" style="max-width: 40px">
                    </div>
                    <div>
                        <div class="font-weight-bold">
                            <a class="text-dark" href="/profile/{{ $post->user->id }}">{{ $post->user->username }}</a>
                        </div>
                    </div>
                </div>

                <hr>

                <p>
                    <span class="font-weight-bold">
                        <a class="text-dark" href="/profile/{{ $post->user->id }}">{{ $post->user->username }}</a>
                    </span>
                    {{ $post->caption }}
                </p>

                <hr>

                
            </div>
        </div>
    </div>

</div>
@endsection
