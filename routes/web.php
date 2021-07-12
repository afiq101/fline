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
// Route::get('/',  function () {
//     return redirect(Route('home.index'));
// });

Route::get('/', 'HomeController@index');
Route::resource('home', 'HomeController');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/comment/{mid}', 'CommentController@displayComment');
    Route::get('/profile', 'ProfileController@profile');
    Route::put('/updateprofile', 'ProfileController@updateprofile');
    Route::get('/manage', 'Media\MediaController@index');
    Route::get('/manage/add', 'Media\MediaController@create');
    Route::post('/manage/save', 'Media\MediaController@store');
    Route::get('/manage/destroy/{id}', 'Media\MediaController@destroy');
    Route::get('/manage/edit/{id}', 'Media\MediaController@edit');
    Route::post('/manage/upload', 'Media\MediaController@update');
});

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::namespace('Media')->prefix('manage')->name('Media.')->group(function(){
//     Route::resource('/Media','MediaController');
// });


Route::resource('like', 'UserLikeController');
Route::resource('star', 'UserStarController');

Route::post('/api/getMedia', 'HomeController@getMedia');
