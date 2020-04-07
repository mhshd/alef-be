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
Route::post('/post/store', 'postController@store')->name('post.store');
Route::get('/post/delete/{id}', 'postController@delete')->name('post.delete');
Route::get('/post/create', 'postController@create')->name('post.create');
Route::get('/search','postController@search')->name('search');
Route::get('/critic', 'postController@critic')->name('critic');
Route::get('/introduce', 'postController@introduce')->name('introduce');
Route::get('/drafts', 'postController@drafts')->name('drafts');
Route::get('/posts', 'HomeController@home')->name('posts');
Route::get('/post/show/{id}', 'postController@show')->name('post.show');
Route::post('/comment/store', 'CommentController@store')->name('comment.add');
Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');

Auth::routes();

Route::get('/', 'HomeController@home')->name('home');
