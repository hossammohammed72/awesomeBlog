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

Route::prefix('admins/')->namespace('Admin')->middleware('auth')->name('admins.')->group(function(){
    Route::get('/', function () {
        return view('layouts/dashboard');
    });    
    Route::resource('posts','PostController');
    Route::resource('categories','CategoryController');

    
});
Route::prefix('/')->name('front.')->group(function(){
    Route::resource('categories','CategoryController');
    Route::get('/category/{category}','FeedController@categoryPosts')->name('feed.category.posts');
    Route::get('/post/{post}','Admin\PostController@show')->name('feed.post.show');


    Route::get('home', 'Front\HomeController@index')->name('home');
    
});
Auth::routes();
