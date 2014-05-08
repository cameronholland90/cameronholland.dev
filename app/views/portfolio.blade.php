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
				<img class='img-responsive' alt="Blackjack Web App" src="img/Blackjack.png" style="display: inline-block; padding: 5px; background-color: #555; border: solid #000 2px;" />
			</div>
			<div class='col-md-6' style='vertical-align: center;'>
				<h3><strong>BLACKJACK</strong></h3>
				<h4>or 21</h4>
				<p>Web application for the card game Blackjack written in php during my enrollment in Codeup's LAMP+J Bootcamp</p>
				<a href="blackjack.php" class="btn btn-success btn-md" role="button">Blackjack</a>
			</div>
		</div>
		<hr>
		<div class='row'>
			<div class='col-md-3'>
				<img class='img-responsive' src="img/Connect-Four.png" alt='Connect Four Web App' style="padding: 3px; background-color: #555; border: solid #000 2px; display: inline-block;">
			</div>
			<div class='col-md-9'>
				<h4><strong>CONNECT FOUR</strong></h4>
				<p>Web application for Connect Four written in php during my enrollment in Codeup's LAMP+J Bootcamp</p>
				<a href="connect-four.php" class='btn btn-success btn-sm'>Connect Four</a>
			</div>
		</div>
		<br>
		<div class='row'>
			<div class='col-md-3'>
				<img class='img-responsive' src="img/Yahtzee.png" alt='Yahtzee Web App' style="padding: 3px; background-color: #555; border: solid #000 2px; display: inline-block;">
			</div>
			<div class='col-md-9'>
				<h4><strong>YAHTZEE</strong></h4>
				<p>Web application for the dice game Yahtzee written in php during my enrollment in Codeup's LAMP+J Bootcamp</p>
				<a href="yahtzee.php" class='btn btn-success btn-sm'>Yahtzee</a>
			</div>
		</div>
		<br>
		<div class='row'>
			<div class='col-md-3'>
				<img class='img-responsive' src="img/Whack-a-mole.png" alt='Whack A Mole Web App' style="padding: 3px; background-color: #555; border: solid #000 2px; display: inline-block;">
			</div>
			<div class='col-md-9'>
				<h4><strong>WHACK A MOLE</strong></h4>
				<p>Web application for the game Whack-a-Mole. Made with Javascript and using a Hanna-Barbera theme</p>
				<a href="whack-a-mole.html" class='btn btn-success btn-sm'>Whack-a-Mole</a>
			</div>
		</div>
		<br>
		<div class='row'>
			<div class='col-md-3'>
				<img class='img-responsive' src="img/Hypnotoad-says.png" alt='Hypnotoad Says Web App' style="padding: 3px; background-color: #555; border: solid #000 2px; display: inline-block;">
			</div>
			<div class='col-md-9'>
				<h4><strong>HYPNOTOAD SAYS</strong></h4>
				<p>Web application for the game simple simon. Made with Javascript and using a Futurama theme</p>
				<a href="simon-says.html" class='btn btn-success btn-sm'>Hypnotoad Says</a>
			</div>
		</div>
		<br>

@stop