<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\FollowsController;

use App\Mail\NewUserWelcomeMail;
use Illuminate\Support\Facades\Input;

Auth::routes();

//Follow
Route::post('follow/{user}', [FollowsController::class, 'store']);

//Index
Route::get('/', [PostsController::class, 'index']);

//Upload
Route::get('/upload', [PostsController::class, 'create']);

//Post
Route::post('/post', [PostsController::class, 'store']);
Route::get('/post/{post}', [PostsController::class, 'show']);
Route::get('/post/{post}/edit', [PostsController::class, 'edit'])->name('post.edit');
Route::patch('/post/{post}', [PostsController::class, 'update'])->name('post.update');
Route::get('/post/{post}/delete', [PostsController::class, 'delete'])->name('post.delete');

//Profile
Route::get('/user/{user}', [ProfilesController::class, 'index'])->name('profile.show');
Route::patch('/user/{user}', [ProfilesController::class, 'update'])->name('profile.update');
Route::get('/user/{user}/edit', [ProfilesController::class, 'edit'])->name('profile.edit');
Route::get('/user/{user}/following', [ProfilesController::class, 'howFollowing'])->name('profile.showFollowing');
Route::get('/user/{user}/followers', [ProfilesController::class, 'showFollowers'])->name('profile.showFollowers');

//List users
Route::get('/users', [ProfilesController::class, 'listUsers'])->name('profile.listUsers');

//Search
Route::get('/search', [ProfilesController::class, 'search']);