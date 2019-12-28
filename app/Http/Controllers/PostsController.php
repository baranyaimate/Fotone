<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use JD\Cloudder\Facades\Cloudder;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');

        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5);

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'caption' => 'required|max:255',
            'image' => ['required', 'image'],
        ]);

        $imagePath = request('image')->store('uploads', 'public');
        $image_name = $request->file('image')->getRealPath();

        Cloudder::upload($image_name, null);

        $url = Cloudder::getResult()['secure_url'];

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $url,
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
