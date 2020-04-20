<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;
use JD\Cloudder\Facades\Cloudder;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $postCount = Cache::remember('count.posts.' . $user->id, now()->addSeconds(10), function() use ($user) {
            return $user->posts->count();
        });

        $followersCount = Cache::remember('count.followers.' . $user->id, now()->addSeconds(10), function() use ($user) {
            return $user->profile->followers->count();
        });

        $followingCount = Cache::remember('count.following.' . $user->id, now()->addSeconds(10), function() use ($user) {
            return $user->following->count();
        });

        return view('profiles.index', compact('user', 'follows', 'postCount', 'followersCount', 'followingCount'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => 'max:100',
            'description' => 'max:255',
            'url' => 'nullable|url',
            'image' => 'max:20480',
        ]);

        if(request('image'))
        {
            request('image')->store('profile', 'public');
            $image_name = $request->file('image')->getRealPath();
            
            Cloudder::upload($image_name, null, array("height"=>1500, "width"=>1500, "crop"=>"fill"));

            $url = Cloudder::getResult()['secure_url'];

            $imageArray = ['image' => $url];
        }

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? [],
        ));

        return redirect("/profile/{$user->id}");
    }

    public function showFollowing(User $user)
    {
        $following = User::whereIn('id', $user->following()->pluck('profiles.user_id'))->orderBy('name')->paginate(20);
        $follows = array();

        foreach ($following as $c) {
            $follows[] = (auth()->user()) ? auth()->user()->following->contains($c->id) : false;
        }

        return view('profiles.following', compact('following', 'user', 'follows'));
    }

    public function showFollowers(User $user)
    {
        $followers = $user->profile->followers->sort()->paginate(20);
        $follows = array();

        foreach ($followers as $c) {
            $follows[] = (auth()->user()) ? auth()->user()->following->contains($c->id) : false;
        }

        return view('profiles.followers', compact('followers', 'user', 'follows'));
    }

    public function listUsers()
    {
        $users = User::orderBy('name')->paginate(20);
        $follows = array();

        foreach ($users as $user) {
            $follows[] = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        }

        return view('profiles.list', compact('users', 'follows'));
    }

    public function search(Request $request)
    {
        $search = $request->get('q');
        $users = User::where('name', 'like', '%' . $search . '%')
            ->orWhere('username', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->paginate(20);
        $follows = array();

        foreach ($users as $user) {
            $follows[] = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        }

        return view('profiles.search', compact('search', 'users', 'follows'));
    }
}
