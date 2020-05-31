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

use App\Mail\NewUserWelcomeMail;
use Illuminate\Support\Facades\Input;

Auth::routes();

//Follow
Route::post('follow/{user}', 'FollowsController@store');

//Index
Route::get('/', 'PostsController@index');

//Upload
Route::get('/upload', 'PostsController@create');

//Post
Route::post('/post', 'PostsController@store');
Route::get('/post/{post}', 'PostsController@show');
Route::get('/post/{post}/edit', 'PostsController@edit')->name('post.edit');
Route::patch('/post/{post}', 'PostsController@update')->name('post.update');
Route::get('/post/{post}/delete', 'PostsController@delete')->name('post.delete');

//Profile
Route::get('/user/{user}', 'ProfilesController@index')->name('profile.show');
Route::patch('/user/{user}', 'ProfilesController@update')->name('profile.update');
Route::get('/user/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::get('/user/{user}/following', 'ProfilesController@showFollowing')->name('profile.showFollowing');
Route::get('/user/{user}/followers', 'ProfilesController@showFollowers')->name('profile.showFollowers');

//List users
Route::get('/users', 'ProfilesController@listUsers')->name('profile.listUsers');

//Search
Route::get('/search', 'ProfilesController@search');