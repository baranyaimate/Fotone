@extends('layouts.app') @section('content')
<div class="container" style="max-width: 900px;">
    <div class="bg-white rounded shadow">
        @if (!$user->posts->isEmpty())
        @foreach($user->posts->chunk(3) as $chunk)
        <div class="row">
            @foreach($chunk as $post)
            <div class="col-md-4">
                <div class="p-0 my-3 border bg-white rounded shadow">
                    <a href="/p/{{ $post->id }}">
                        <img src="{{ $post->image }}" alt="{{ $post->caption }}" class="w-100 rounded">
                    </a>
                    <div class="d-md-none py-2 px-2">
                        <p class="d-flex d-md-none py-2 text-justify m-0">{{ $post->caption }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach
        @else
        <h3 class="text-center w-100">No posts yet</h3>
        @endif
    </div>
</div>
@endsection