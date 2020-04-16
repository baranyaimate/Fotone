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

/*
Route::get('/email', function() {
  return new NewUserWelcomeMail();
});
*/

Route::post('follow/{user}', 'FollowsController@store');

Route::get('/', 'PostsController@index');
Route::get('/upload', 'PostsController@create');
Route::post('/p', 'PostsController@store');
Route::get('/p/{post}', 'PostsController@show');
Route::get('/explore', 'PostsController@explore');

Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');
Route::get('/profile/{user}/following', 'ProfilesController@showFollowing')->name('profile.showFollowing');
Route::get('/profile/{user}/followers', 'ProfilesController@showFollowers')->name('profile.showFollowers');

Route::get('/users', 'ProfilesController@showUsersList')->name('profile.showUsersList');
Route::get('/search', 'ProfilesController@search');