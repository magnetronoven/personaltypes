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
Route::get('/cms', 'CmsController@index')->name('cms');

Route::resource('cms/teams', 'cms\TeamController');
Route::resource('cms/positions', 'cms\PositionController');
Route::resource('cms/catagories', 'cms\CatagoryController');
Route::resource('cms/users', 'cms\UserController');
Route::resource('cms/themes', 'cms\ThemeController');

Route::get('/{team}/{catagory}', 'CatagoryController@index')->name('catagory');