<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function showResume() 
	{
		return View::make('resume');
	}

	public function showPortfolio() 
	{
		return View::make('portfolio');
	}

	public function showBlackjack()
	{
		return View::make('projects.blackjack');
	}

	public function showYahtzee()
	{
		return View::make('projects.yahtzee');
	}

	public function showConnect()
	{
		return View::make('projects.connect');
	}

	public function alertMessage()
	{
		$alert_message = Input::get('alert_message');
		$alert_type = Input::get('alert_type');

		return View::make('layouts.partials.alert')->with(['alert_message' => $alert_message, 'alert_type' => $alert_type]);
	}

	public function bootboxTemplate()
	{
		$bootbox_template_name = Input::get('bootbox_template_name');

		return View::make('bootbox.' . $bootbox_template_name);
	}

}