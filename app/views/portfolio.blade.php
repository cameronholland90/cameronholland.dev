@extends('layouts.master')

@section('top-script')
	<title>Portfolio</title>

@stop

@section('content')
		<div class="page-header">
			<h1>Cameron Holland <small>My Portfolio</small></h1>
		</div>
		<div class='row'>
			<div class='col-md-6'>
				<img class='lrg-project-img img-responsive' alt="Westmoreland Builders Web App" src="/img/portfolio/westmoreland.png" />
			</div>
			<div class='col-md-6'>
				<h3><strong>WESTMORELAND BUILDERS</strong></h3>
				<p>Company website made using the LAMP+J stack. Built to allow Westmoreland Builders to display their current projects and customers to any visitors. Enables them to add projects, offices or customers as more are gained and modify content on the home page. Built while contracting with <a href="http://theformu.la/">The Formula Idea Works</a>.</p>
				<a href="http://westmoreland.theformu.la" class="btn btn-custom btn-md">Westmoreland Builders</a>
			</div>
		</div>
		<hr>
		<div class='row'>
			<div class='col-md-3'>
				<img class='small-project-img img-responsive' alt="Lead Propeller Web App" src="/img/portfolio/leadpropeller.png" />
			</div>
			<div class='col-md-9'>
				<h3><strong>LEAD PROPELLER</strong></h3>
				<p>Website editor made using the LAMP+J stack. Primarily targeted towards Real Estate Investors or House Flippers.</p>
				<a href="http://leadpropeller.com" class="btn btn-custom btn-md">Lead Propeller</a>
			</div>
		</div>
		<br>
		<div class='row'>
			<div class='col-md-3'>
				<img class='small-project-img img-responsive' src="/img/portfolio/blackjack.png" alt='Blackjack Web App in Javascript'>
			</div>
			<div class='col-md-9'>
				<h4><strong>BLACKJACK</strong></h4>
				<p>Web application for the card game Blackjack written in javascript.</p>
				<a href="{{ action('ProjectsController@getBlackjack') }}" class='btn btn-custom btn-sm'>Blackjack</a>
			</div>
		</div>
		{{-- <br>
		<div class='row'>
			<div class='col-md-3'>
				<img class='small-project-img img-responsive' src="/img/portfolio/connect-four.png" alt='Connect Four Web App'>
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
				<img class='small-project-img img-responsive' src="/img/portfolio/yahtzee.png" alt='Yahtzee Web App'>
			</div>
			<div class='col-md-9'>
				<h4><strong>YAHTZEE</strong></h4>
				<p>Web application for the dice game Yahtzee written in php during my enrollment in Codeup's LAMP+J Bootcamp</p>
				<a href="/yahtzee.php" class='btn btn-custom btn-sm'>Yahtzee</a>
			</div>
		</div> --}}
		<br>
		<div class='row'>
			<div class='col-md-3'>
				<img class='small-project-img img-responsive' src="/img/portfolio/whack-a-mole.png" alt='Whack A Mole Web App'>
			</div>
			<div class='col-md-9'>
				<h4><strong>WHACK A MOLE</strong></h4>
				<p>Web application for the game Whack-a-Mole. Made with Javascript and using a Hanna-Barbera theme</p>
				<a href="{{ action('ProjectsController@getWhackAMole') }}" class='btn btn-custom btn-sm'>Whack-a-Mole</a>
			</div>
		</div>
		<br>
		<div class='row'>
			<div class='col-md-3'>
				<img class='small-project-img img-responsive' src="/img/portfolio/hypnotoad-says.png" alt='Hypnotoad Says Web App'>
			</div>
			<div class='col-md-9'>
				<h4><strong>HYPNOTOAD SAYS</strong></h4>
				<p>Web application for the game simple simon. Made with Javascript and using a Futurama theme. Not mobile responsive yet.</p>
				<a href="{{ action('ProjectsController@getHypnotoad') }}" class='btn btn-custom btn-sm'>Hypnotoad Says</a>
			</div>
		</div>
		<br>
		<div class='row'>
			<div class='col-md-3'>
				<img class='small-project-img img-responsive' src="/img/portfolio/hal-9000.png" alt='Hal 9000 Says Web App'>
			</div>
			<div class='col-md-9'>
				<h4><strong>HAL 9000 SAYS</strong></h4>
				<p>Web application for the game simple simon. Made with Javascript and using a Hal 9000 theme</p>
				<a href="{{ action('ProjectsController@getHalSays') }}" class='btn btn-custom btn-sm'>Hal 9000 Says</a>
			</div>
		</div>
		<br>

@stop