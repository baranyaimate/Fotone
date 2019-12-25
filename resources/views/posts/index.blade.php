@extends('layouts.app')

@section('content')
<div class="container">

    @foreach($posts as $post)
        <div class="col-md-6 mx-auto mb-4 p-0 border bg-white rounded">
            <div class="py-3 px-2">
                <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle pr-1" alt="" style="max-width: 35px">
                <span class="font-weight-bold">
                    <a class="no-a-styling" href="/profile/{{ $post->user->id }}">{{ $post->user->username }}</a>
                </span>
            </div>
            <div class="">
                <a href="/p/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" alt="{{ $post->caption }}" class="w-100">
                </a>
            </div>
            <div class="py-2 px-2">
                <p class="text-justify m-0">
                    {{ $post->caption }}
                </p>
            </div>
        </div>
    @endforeach

    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>

</div>
@endsection
