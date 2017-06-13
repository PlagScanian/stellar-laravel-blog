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
// Auth::routes();
Route::auth();

Route::get('/','PostController@index');
Route::get('/home',['as' => 'home', 'uses' => 'PostController@index']);
// check for logged in user
Route::group(['middleware' => ['auth']], function()
{
	 // show new post form
	 Route::get('new-post','PostController@create');
	 // save new post
	 Route::post('new-post','PostController@store');
	 // edit post form
	 Route::get('edit/{slug}','PostController@edit');
	 // update post
	 Route::post('update','PostController@update');
	 // delete post
	 Route::get('delete/{id}','PostController@destroy');
	 // add comment
	 Route::post('comment/add','CommentController@store');
	 // delete comment
	 Route::post('comment/delete/{id}','CommentController@destroy');
});
// display list of posts
Route::get('user/{id}/posts','UserController@user_posts_all')->where('id', '[0-9]+');
// display single post
Route::get('/{slug}',['as' => 'post', 'uses' => 'PostController@show'])->where('slug', '[A-Za-z0-9-_]+');
