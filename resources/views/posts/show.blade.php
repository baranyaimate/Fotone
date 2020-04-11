@extends('layouts.app') @section('content')
<div class="container" style="max-width: 900px;">
    <div class="bg-white rounded shadow">
        <div class="row m-0">
            <div class="d-flex align-items-center m-3">
                <div class="pr-3">
                    <img src="{{ $post->user->profile->profileImage() }}" alt="" class="w-100 rounded-circle"
                        style="max-width: 40px">
                </div>
                <div>
                    <div class="font-weight-bold">
                        <a class="text-dark" href="/profile/{{ $post->user->id }}">{{ $post->user->username }}</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row m-0">
            <div class="col-md-8 p-0 px-3 px-md-0">
                <img src="{{ $post->image }}" alt="{{ $post->caption }}" class="w-100 rounded">
            </div>

            <div class="col-md-4 p-0">
                <p style="text-align: justify" class="px-3 py-2 py-md-0">
                    {{ $post->caption }}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection