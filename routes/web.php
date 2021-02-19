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




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/searchget', 'User\UsersController@getSearch')->name('get.user.search');
Route::post('/searchpost', 'User\UsersController@search')->name('user.search');
Route::post('/searchpost2', 'User\UsersController@search2')->name('user.search2');
Route::post('/searchpost3', 'User\UsersController@search3')->name('user.search3');
Route::post('/searchpost4', 'User\UsersController@search4')->name('user.search4');
