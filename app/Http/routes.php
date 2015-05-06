<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'PagesController@index');

Route::get('/about', 'PagesController@about');

Route::get('/contact', 'PagesController@contact');

Route::get('/admin', 'AdminController@index');

Route::get('admin/articles', 'AdminController@articles');

Route::get('admin/settings', 'AdminController@settings');

Route::get('tags/{tags}', 'TagsController@show');

Route::get('admin/tags', 'TagsController@create');

Route::post('admin/tags', 'TagsController@store');

Route::resource('articles', 'ArticlesController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
