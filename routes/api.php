<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::name('api.')->group(function(){
    Route::prefix('admins/')->namespace('Admin')->name('admins.')->group(function(){
    Route::middleware('auth')->group(function(

    ){});
    Route::get('categories/','CategoryController@categoriesinJson')->name('categories.index');
    });

});
