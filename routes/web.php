<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('/',  function () {
    return redirect(Route('home.index'));
});

Route::resource('home', 'HomeController');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/comment/{mid}', 'CommentController@displayComment');
    Route::get('/profile', 'ProfileController@profile');
});

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Media')->prefix('Media')->name('Media.')->group(function(){
Route::resource('/Media','MediaController');
});

Route::get('/Media/destroy/{id}', 'Media\MediaController@destroy');
Route::get('/Media/edit/{id}', 'Media\MediaController@edit');
Route::post('/Media/upload', 'Media\MediaController@update');

Route::resource('like', 'UserLikeController');
Route::resource('star', 'UserStarController');

