<?php

class ProjectsController extends \BaseController {


	public function getAll()
	{
		return View::make('portfolio');
	}


	public function getBlackjack()
	{
		return View::make('projects.blackjack');
	}


	public function getHalSays()
	{
		return View::make('projects.hal');
	}


	public function getFizzBuzzNoLoops()
	{
		return View::make('projects.fizzbuzz');
	}


	public function getFizzBuzzNoConditionals()
	{
		return View::make('projects.fizzbuzz-nocondition');
	}


	public function getHandHtml()
	{
		$hand = Input::get('hand');
		$hide_card = Input::get('hide_card');
		$card_back = Input::get('card_back');

		return Blackjack::handHtml($hand, $hide_card, $card_back);
	}


	public function getDeckHtml()
	{
		$deck_count = Input::get('deck_count');
		$card_back = Input::get('card_back');

		return Blackjack::deckHtml($deck_count, $card_back);
	}


	public function getYahtzee()
	{
		return View::make('projects.yahtzee');
	}


	public function getConnectFour()
	{
		return View::make('projects.connect');
	}


}
