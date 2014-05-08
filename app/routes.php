<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/login', 'UsersController@showLogin');

Route::get('/logout', 'UsersController@logout');

Route::post('/login', 'UsersController@doLogin');

Route::get('/', 'HomeController@showResume');

Route::get('/resume', 'HomeController@showResume');

Route::resource('posts', 'PostsController');

Route::resource('users', 'UsersController');

Route::get('/portfolio', 'HomeController@showPortfolio');
