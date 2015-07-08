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

Route::get('/', 'WelcomeController@index');
Route::get('home', 'HomeController@index');


Route::get('about', ['as' => 'about', 'uses' => 'StaticController@about']);
Route::get('contact', ['as' => 'contact', 'uses' => 'StaticController@contact']);

Route::get('login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
Route::get('register', ['as' => 'register', 'uses' => 'Auth\AuthController@getRegister']);

Route::get('blog', ['as' => 'blog', 'uses' => 'Blog\BlogController@index']);
Route::resource('blog', 'Blog\BlogController');
Route::resource('blog.comment', 'Blog\CommentController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
