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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/cms', 'cms\CmsController@index')->name('cms');

Route::get('/cms/users/admins', 'cms\UserController@admins')->name('users.admins');

Route::resource('cms/teams', 'cms\TeamController');
Route::resource('cms/positions', 'cms\PositionController');
Route::resource('cms/catagories', 'cms\CatagoryController');
Route::resource('cms/users', 'cms\UserController');
Route::resource('cms/themes', 'cms\ThemeController');
Route::resource('cms/types', 'cms\TypeController');


Route::get('/user/{user}', 'UserController@show')->name('showuser');
Route::get('/{team}/{catagory}', 'CatagoryController@index')->name('catagory');