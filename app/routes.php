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

Route::controller('projects', 'ProjectsController');
Route::get('/ajax/blackjack-card', 'ProjectsController@getHandHtml');
Route::get('/ajax/blackjack-deck', 'ProjectsController@getDeckHtml');

Route::get('/ajax/alert-message', 'HomeController@alertMessage');
Route::get('/ajax/bootbox-template', 'HomeController@bootboxTemplate');

Route::get('/login', 'UsersController@showLogin');

Route::get('/logout', 'UsersController@logout');

Route::post('/login', 'UsersController@doLogin');

Route::get('/', 'HomeController@showResume');

Route::get('/resume', 'HomeController@showResume');

Route::resource('posts', 'PostsController');

Route::resource('users', 'UsersController');

Route::get('/portfolio', 'HomeController@showPortfolio');

Route::get('/html-forms', function() {
	return View::make('codeup-mock-instruction.html-forms');
});
Route::get('/version-control', function() {
	return View::make('codeup-mock-instruction.version-control');
});
