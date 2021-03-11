<?php

use App\Http\Controllers\HomeController;

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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('profile', 'ProfileController@index')->name('profile');
    Route::post('profile', 'ProfileController@store')->name('profile.store');
});

Route::post('comment', 'CommentsController@store')->name('comments.store');
Route::get('comments', 'CommentsController@index')->name('comments.index');
Route::get('users', 'UsersController@index')->name('users.index');

