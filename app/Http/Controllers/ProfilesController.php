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
            $imagePath = request('image')->store('profile', 'public');
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
        $following = User::findOrFail($user->following()->pluck('profiles.user_id'));
        $follows = array();

        foreach ($following as $user) {
            $follows[] = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        }

        return view('profiles.following', compact('following', 'user', 'follows'));
    }

    public function showFollowers(User $user)
    {
        $followers = $user->profile->followers;
        $follows = array();

        foreach ($followers as $user) {
            $follows[] = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        }

        return view('profiles.followers', compact('followers', 'user', 'follows'));
    }

    public function showUsersList(User $user)
    {
        $users = User::all();
        $follows = array();

        foreach ($users as $user) {
            $follows[] = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        }

        return view('profiles.usersList', compact('users', 'follows'));
    }
}
