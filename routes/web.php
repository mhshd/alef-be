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

/**
 * Groups of routes that needs authentication to access.
 */


// Here Routes that don't need Auth.
Route::get('/post/create', 'postController@create')->name('post.create');
Route::post('/post/store', 'postController@store')->name('post.store');
Route::get('/post/delete/{id}', 'postController@delete')->name('post.delete');
Route::get('/post/edit/{id}', 'postController@edit')->name('post.edit');
Route::post('/post/update', 'postController@update')->name('update');

Route::get('/search','postController@search')->name('search');
Route::get('/critic', 'postController@critic')->name('critic');
Route::get('/introduce', 'postController@introduce')->name('introduce');
Route::get('/drafts', 'postController@drafts')->name('drafts');
Route::get('/teach', 'postController@teach')->name('teach');

Route::get('/mostViewd', 'postController@mostViewd')->name('mostViewd');
Route::get('/posts', 'HomeController@home')->name('posts');
Route::get('/post/show/{id}', 'postController@show')->name('post.show');
Route::post('/comment/store', 'CommentController@store')->name('comment.add');
Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');

Auth::routes();

Route::get('/home', 'HomeController@home')->name('home');
Route::redirect('/', '/home');



