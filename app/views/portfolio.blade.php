@extends('layouts.master')

@section('tab-title')
	<title>Portfolio</title>

@stop

@section('content')
		<div class="page-header">
			<h1>Cameron Holland <small>My Portfolio</small></h1>
		</div>
		<div class='row'>
			<div class='col-md-6'>
				<img class='img-responsive' alt="Lead Propeller Web App" src="/img/portfolio/leadpropeller.png" style="display: inline-block; padding: 5px; background-color: #555; border: solid #000 2px;" />
			</div>
			<div class='col-md-6' style='vertical-align: center;'>
				<h3><strong>LEAD PROPELLER</strong></h3>
				<p>Website editor made using the LAMP+J stack. Primarily targeted towards Real Estate Investors or House Flippers.</p>
				<a href="http://leadpropeller.com" class="btn btn-custom btn-md" role="button">Lead Propeller</a>
			</div>
		</div>
		<hr>
		<div class='row'>
			<div class='col-md-3'>
				<img class='img-responsive' src="/img/portfolio/blackjack-js.png" alt='Blackjack Web App in Javascript' style="padding: 3px; background-color: #555; border: solid #000 2px; display: inline-block;">
			</div>
			<div class='col-md-9'>
				<h4><strong>BLACKJACK IN JS</strong></h4>
				<h5>or 21</h5>
				<p>Web application for the card game Blackjack written in javascript. Modified from php version listed below.</p>
				<a href="{{ action('ProjectsController@getBlackjack') }}" class='btn btn-custom btn-sm'>Blackjack in JS</a>
			</div>
		</div>
		<br>
		<div class='row'>
			<div class='col-md-3'>
				<img class='img-responsive' src="/img/portfolio/blackjack-php.png" alt='Blackjack Web App in PHP' style="padding: 3px; background-color: #555; border: solid #000 2px; display: inline-block;">
			</div>
			<div class='col-md-9'>
				<h4><strong>BLACKJACK IN PHP</strong></h4>
				<h5>or 21</h5>
				<p>Web application for the card game Blackjack written in php during my enrollment in Codeup's LAMP+J Bootcamp</p>
				<a href="/blackjack.php" class='btn btn-custom btn-sm'>Blackjack in PHP</a>
			</div>
		</div>
		<br>
		<div class='row'>
			<div class='col-md-3'>
				<img class='img-responsive' src="/img/portfolio/connect-four.png" alt='Connect Four Web App' style="padding: 3px; background-color: #555; border: solid #000 2px; display: inline-block;">
			</div>
			<div class='col-md-9'>
				<h4><strong>CONNECT FOUR</strong></h4>
				<p>Web application for Connect Four written in php during my enrollment in Codeup's LAMP+J Bootcamp</p>
				<a href="/connect-four.php" class='btn btn-custom btn-sm'>Connect Four</a>
			</div>
		</div>
		<br>
		<div class='row'>
			<div class='col-md-3'>
				<img class='img-responsive' src="/img/portfolio/yahtzee.png" alt='Yahtzee Web App' style="padding: 3px; background-color: #555; border: solid #000 2px; display: inline-block;">
			</div>
			<div class='col-md-9'>
				<h4><strong>YAHTZEE</strong></h4>
				<p>Web application for the dice game Yahtzee written in php during my enrollment in Codeup's LAMP+J Bootcamp</p>
				<a href="/yahtzee.php" class='btn btn-custom btn-sm'>Yahtzee</a>
			</div>
		</div>
		<br>
		<div class='row'>
			<div class='col-md-3'>
				<img class='img-responsive' src="/img/portfolio/whack-a-mole.png" alt='Whack A Mole Web App' style="padding: 3px; background-color: #555; border: solid #000 2px; display: inline-block;">
			</div>
			<div class='col-md-9'>
				<h4><strong>WHACK A MOLE</strong></h4>
				<p>Web application for the game Whack-a-Mole. Made with Javascript and using a Hanna-Barbera theme</p>
				<a href="/whack-a-mole.html" class='btn btn-custom btn-sm'>Whack-a-Mole</a>
			</div>
		</div>
		<br>
		<div class='row'>
			<div class='col-md-3'>
				<img class='img-responsive' src="/img/portfolio/hypnotoad-says.png" alt='Hypnotoad Says Web App' style="padding: 3px; background-color: #555; border: solid #000 2px; display: inline-block;">
			</div>
			<div class='col-md-9'>
				<h4><strong>HYPNOTOAD SAYS</strong></h4>
				<p>Web application for the game simple simon. Made with Javascript and using a Futurama theme</p>
				<a href="/simon-says.html" class='btn btn-custom btn-sm'>Hypnotoad Says</a>
			</div>
		</div>
		<br>

@stop