<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', 'HomeController@index')->name('home');

Route::get('/post/create', 'postController@create')->name('post.create');
Route::post('/post/store', 'postController@store')->name('post.store');
Route::get('/posts', 'HomeController@index')->name('posts');
Route::get('/UserProfile','HomeController@ShowUserSetting')->name('userProfile');
Route::get('/post/show/{id}', 'postController@show')->name('post.show');
Route::post('/comment/store', 'CommentController@store')->name('comment.add');
Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');
Auth::routes();

