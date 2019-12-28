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

if (env('APP_ENV') === 'production') {
  URL::forceScheme('https');
}

Route::get('/email', function() {
  return new NewUserWelcomeMail();
});

Route::post('follow/{user}', 'FollowsController@store');

Route::get('/', 'PostsController@index');
Route::get('/p/create', 'PostsController@create');
Route::post('/p', 'PostsController@store');
Route::get('/p/{post}', 'PostsController@show');

Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');
Route::get('/profile/{user}/following', 'ProfilesController@showFollowing')->name('profile.showFollowing');
Route::get('/profile/{user}/followers', 'ProfilesController@showFollowers')->name('profile.showFollowers');

Route::get('/users', 'ProfilesController@showUsersList')->name('profile.showUsersList');

Route::get('/imageupload', 'ImageUploadController@home');

Route::post('/upload/images', [
  'uses'   =>  'ImageUploadController@uploadImages',
  'as'     =>  'uploadImage'
]);