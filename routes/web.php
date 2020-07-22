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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/main', function () {
    return view('main');
});

Route::get('posts/create',"PostsController@create")->
                                                    name("create-post")->
                                                    middleware("auth");

Route::post('posts',"PostsController@store")->
                                            name("posts")->
                                            middleware("auth");

Route::get('user/posts',"PostsController@userPosts")->
                                            name("user-posts")->
                                            middleware("auth");

Route::get('posts/{post}',"PostsController@show")->name("post");

Route::get("posts/{post}/edit","PostsController@edit")->name("edit-post");

Route::put("posts/{post}","PostsController@update");

Route::get("posts","PostsController@index");


Route::post("comments","CommentsController@store")->middleware("auth");


Route::get('/test', function() {
    return response()->json([
     'stuff' => phpinfo()
    ]);
 });


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
