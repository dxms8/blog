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

Route::get('/', 'StaticPagesController@home')->name('home');

Route::get('/help', 'StaticPagesController@help')->name('help');

Route::get('/about', 'StaticPagesController@about')->name('about');

Route::get('signup', 'UsersController@create')->name('signup');

Route::resource('users', 'UsersController');

Route::get('login', 'SessionsController@create')->name('login');
Route::post('login', 'SessionsController@store')->name('login');
Route::delete('logout', 'SessionsController@destroy')->name('logout');

Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');

Route::get('signup/confirm/{token}', 'UsersController@confirmEmail')->name('confirm_email');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

Route::resource('statuses', 'StatusesController', ['only' => ['store', 'destroy']]);

Route::get('/users/{user}/followings', 'UsersController@followings')->name('users.followings');
Route::get('/users/{user}/followers', 'UsersController@followers')->name('users.followers');

Route::post('/users/followers/{user}', 'FollowersController@store')->name('followers.store');
Route::delete('/users/followers/{user}', 'FollowersController@destroy')->name('followers.destroy');


Route::any('foo', function () {
    return 'Hello World';
});

Route::get('/info', function () {
    phpinfo();
});

Route::redirect('/here', '/there', 301);


Route::get('/there', function () {
    return '???';
});

//Route::view('/welcome', 'welcome');
Route::view('/welcome', 'welcome', ['name' => 'Taylor']);

//Route::get('user/{id}', function ($id) {
//    return 'User '.$id;
//});

Route::get('posts/{post}/comments/{comment}', function ($postId, $commentId) {
    //
    return 'aaaaa '.$postId.$commentId;
});

//Route::get('user/{name?}', function ($name = 'John') {
//    return 'Hello '.$name;
//});


//Route::get('user/profile', 'UserController@showProfile')->name('profile');

Route::resource('photos', 'PhotoController');

Route::get('post/create', 'PostController@create');

Route::post('post', 'PostController@store');
