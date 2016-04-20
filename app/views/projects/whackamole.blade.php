@extends('layouts.master')

@section('top-script')
	<link rel="stylesheet" type="text/css" href="/css/whack-a-mole.css">
	<title>Whack-A-Mole</title>
@stop

@section('content')
	<div class='board'>
		<h1 id='playing' class='page-header'>Whack-A-Mole<small><p>Your Score: <span id='count'>0</span></p><p id='highscore'>High Score: 0</p><p id='timer'>Time Left: 30</p></small></h1>
		<div class='row'>
			<button id='start-game' class='btn btn-success'>Start Game</button>
			<h1 id='game-over' class='page-header'>Game Over <small id='end-score'></small></h1>
			<div class='hole'><img id='1' src="/img/Moroccomole.png"/></div>
			<div class='hole'><img id='2' src="/img/Moroccomole.png"/></div>
			<div class='hole'><img id='3' src="/img/Moroccomole.png"/></div>
		</div>
		<div class='row'>
			<div class='hole'><img id='4' src="/img/Moroccomole.png"/></div>
			<div class='hole'><img id='5' src="/img/Moroccomole.png"/></div>
			<div class='hole'><img id='6' src="/img/Moroccomole.png"/></div>
		</div>
		<div class='row'>
			<div class='hole'><img id='7' src="/img/Moroccomole.png"/></div>
			<div class='hole'><img id='8' src="/img/Moroccomole.png"/></div>
			<div class='hole'><img id='9' src="/img/Moroccomole.png"/></div>
		</div>
	</div>
@stop

@section('bottom-script')
	<script src="/js/whack-a-mole.js"></script>
@stop