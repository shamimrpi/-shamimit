<?php

use Illuminate\Support\Facades\Route;
use App\Controllers\UsersController;
use App\MessagesController;
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



Auth::routes();

Route::get('/','UsersController@login')->name('login');
Route::post('/login','UsersController@store')->name('login.store');
Route::get('/dashboard','UsersController@dashboard')->name('dashboard')->middleware('auth');
Route::get('/logout','UsersController@logout')->name('logout');
Route::get('/update/password','UsersController@updatePassword')->name('update.password')->middleware('auth');
Route::put('update/pass_store','UsersController@passwordStore')->name('pass.store')->middleware('auth');
Route::get('/users/create','UsersController@create_user')->name('user.create');
Route::post('/users/create','UsersController@create_user_store')->name('create.users.store')->middleware('auth');

Route::get('/edit/photo','UsersController@editPic')->name('edit.pic')->middleware('auth');
Route::put('/update/photo','UsersController@updatePic')->name('update.pic')->middleware('auth');

Route::get('/users','UsersController@index')->name('users')->middleware('auth');
Route::get('/profile','ProfilesController@index')->name('profile')->middleware('auth');

Route::get('/posts/{id}/liked','LikesController@like')->name('like.store')->middleware('auth');
Route::post('/posts/{id}/comment','CommentsController@commentStore')->name('comment.store')->middleware('auth');

Route::get('/profile/{id}/profile','CommonUsersController@profile')->name('common.profile')->middleware('auth');
Route::get('/f_request/{id}/','FriendsController@store')->name('friend.store')->middleware('auth');
Route::get('/reject/{id}/','FriendsController@reject')->name('friend.destroy')->middleware('auth');
Route::get('/users/{id}/accept','FriendsController@accept')->name('friend.accept')->middleware('auth');
Route::get('/sms','MessagesController@index')->name('sms')->middleware('auth');
Route::get('/sms/create','MessagesController@create')->name('create.sms')->middleware('auth');
Route::post('/sms/store','MessagesController@store')->name('sms.store')->middleware('auth');
Route::get('/sms/{id}/reply','MessagesController@reply')->name('sms.reply')->middleware('auth');
Route::post('/sms/{id}/store','MessagesController@reply_store')->name('sms.reply.store')->middleware('auth');
Route::get('/sms/sent','MessagesController@sent_sms')->name('sent.sms')->middleware('auth');
Route::get('/sms/{id}/show','MessagesController@show')->name('sms.show')->middleware('auth');
Route::delete('/sms/{id}/delete','MessagesController@destroy')->name('sms.destroy');



Route::get('/posts','PostsController@create')->name('posts');
Route::post('/posts','PostsController@store')->name('posts.store');
Route::get('/posts/{id}/edit','PostsController@edit')->name('posts.edit');
Route::put('/posts/{id}/update','PostsController@update')->name('posts.update');
