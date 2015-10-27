@extends('layouts.master')

@section('tab-title')
	<title>Projects - Blackjack</title>
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="/css/hal.css">
@stop

@section('content')
	<audio preload="auto" id="beep">
		<source src="/sounds/hal-beep.wav" type="audio/wav"/>
	</audio>
	<audio preload="auto" id="start-game">
		<source src="/sounds/hal-enjoyable-game.wav" type="audio/wav"/>
	</audio>
	<audio preload="auto" id="daisy">
		<source src="/sounds/hal-daisy.wav" type="audio/wav"/>
	</audio>
	<audio preload="auto" id="error">
		<source src="/sounds/hal-error.wav" type="audio/wav"/>
	</audio>
	<audio preload="auto" id="woop">
		<source src="/sounds/hal-woop.wav" type="audio/wav"/>
	</audio>
	<audio preload="auto" id="difficult">
		<source src="/sounds/hal-difficult.wav" type="audio/wav"/>
	</audio>
	<audio preload="auto" id="goodbye">
		<source src="/sounds/hal-goodbye.wav" type="audio/wav"/>
	</audio>
	<audio preload="auto" id="breath">
		<source src="/sounds/suit-breath.wav" type="audio/wav"/>
	</audio>
	<audio preload="auto" id="cant-allow">
		<source src="/sounds/hal-cant-allow.wav" type="audio/wav"/>
	</audio>
	<audio preload="auto" id="hal-afraid">
		<source src="/sounds/hal-afraid.wav" type="audio/wav"/>
	</audio>
	<audio preload="auto" id="hal-fault">
		<source src="/sounds/hal-fault.wav" type="audio/wav"/>
	</audio>
	<audio preload="auto" id="hal-puzzling">
		<source src="/sounds/hal-puzzling.wav" type="audio/wav"/>
	</audio>
	<audio preload="auto" id="hal-upset">
		<source src="/sounds/hal-upset.wav" type="audio/wav"/>
	</audio>
	<audio preload="auto" id="hal-sorry">
		<source src="/sounds/hal-sorry.wav" type="audio/wav"/>
	</audio>
	<audio preload="auto" id="hal-odd">
		<source src="/sounds/hal-odd.wav" type="audio/wav"/>
	</audio>
	<div class="row memory-cores">
		<div class="col-xs-1 memory-core">
			<div class="inner-div" data-corenum="1">
				<p class="text-center">1</p>
			</div>
		</div>
		<div class="col-xs-1 memory-core">
			<div class="inner-div" data-corenum="2">
				<p class="text-center">2</p>
			</div>
		</div>
		<div class="col-xs-1 memory-core">
			<div class="inner-div" data-corenum="3">
				<p class="text-center">3</p>
			</div>
		</div>
		<div class="col-xs-1 memory-core">
			<div class="inner-div" data-corenum="4">
				<p class="text-center">4</p>
			</div>
		</div>
		<div class="col-xs-1 memory-core">
			<div class="inner-div" data-corenum="5">
				<p class="text-center">5</p>
			</div>
		</div>
		<div class="col-xs-1 memory-core">
			<div class="inner-div" data-corenum="6">
				<p class="text-center">6</p>
			</div>
		</div>
		<div class="col-xs-1 memory-core">
			<div class="inner-div" data-corenum="7">
				<p class="text-center">7</p>
			</div>
		</div>
		<div class="col-xs-1 memory-core">
			<div class="inner-div" data-corenum="8">
				<p class="text-center">8</p>
			</div>
		</div>
		<div class="col-xs-1 memory-core">
			<div class="inner-div" data-corenum="9">
				<p class="text-center">9</p>
			</div>
		</div>
		<div class="col-xs-1 memory-core">
			<div class="inner-div" data-corenum="10">
				<p class="text-center">10</p>
			</div>
		</div>
		<div class="col-xs-1 memory-core">
			<div class="inner-div" data-corenum="11">
				<p class="text-center">11</p>
			</div>
		</div>
		<div class="col-xs-1 memory-core">
			<div class="inner-div" data-corenum="12">
				<p class="text-center">12</p>
			</div>
		</div>
	</div>
	<div class="row memory-cores">
		<div class="col-xs-1 memory-core">
			<div class="inner-div" data-corenum="13">
				<p class="text-center">1</p>
			</div>
		</div>
		<div class="col-xs-1 memory-core">
			<div class="inner-div" data-corenum="14">
				<p class="text-center">2</p>
			</div>
		</div>
		<div class="col-xs-1 memory-core">
			<div class="inner-div" data-corenum="15">
				<p class="text-center">3</p>
			</div>
		</div>
		<div class="col-xs-1 memory-core">
			<div class="inner-div" data-corenum="16">
				<p class="text-center">4</p>
			</div>
		</div>
		<div class="col-xs-1 memory-core">
			<div class="inner-div" data-corenum="17">
				<p class="text-center">5</p>
			</div>
		</div>
		<div id="hal" class="col-xs-2 text-center">
			<div class="row" id="difficulties">
				<button class="difficulty btn btn-default btn-hal active" data-difficulty="easy">Easy</button>
				<button class="difficulty btn btn-default btn-hal" data-difficulty="medium">Medium</button>
				<button class="difficulty btn btn-default btn-hal" data-difficulty="hard">Hard</button>
			</div>
			<div class="row" id="game-buttons">
				<button class="btn btn-hal btn-success" id="start">Start Game</button>
				<button class="btn btn-hal btn-danger" id="quit">Quit Game</button>
			</div>
		</div>
		<div class="col-xs-1 memory-core">
			<div class="inner-div" data-corenum="18">
				<p class="text-center">8</p>
			</div>
		</div>
		<div class="col-xs-1 memory-core">
			<div class="inner-div" data-corenum="19">
				<p class="text-center">9</p>
			</div>
		</div>
		<div class="col-xs-1 memory-core">
			<div class="inner-div" data-corenum="20">
				<p class="text-center">10</p>
			</div>
		</div>
		<div class="col-xs-1 memory-core">
			<div class="inner-div" data-corenum="21">
				<p class="text-center">11</p>
			</div>
		</div>
		<div class="col-xs-1 memory-core">
			<div class="inner-div" data-corenum="22">
				<p class="text-center">12</p>
			</div>
		</div>
	</div>
	<div class="row memory-cores">
		<div class="col-xs-1 memory-core">
			<div class="inner-div" data-corenum="23">
				<p class="text-center">1</p>
			</div>
		</div>
		<div class="col-xs-1 memory-core">
			<div class="inner-div" data-corenum="24">
				<p class="text-center">2</p>
			</div>
		</div>
		<div class="col-xs-1 memory-core">
			<div class="inner-div" data-corenum="25">
				<p class="text-center">3</p>
			</div>
		</div>
		<div class="col-xs-1 memory-core">
			<div class="inner-div" data-corenum="26">
				<p class="text-center">4</p>
			</div>
		</div>
		<div class="col-xs-1 memory-core">
			<div class="inner-div" data-corenum="27">
				<p class="text-center">5</p>
			</div>
		</div>
		<div class="col-xs-1 memory-core">
			<div class="inner-div" data-corenum="28">
				<p class="text-center">6</p>
			</div>
		</div>
		<div class="col-xs-1 memory-core">
			<div class="inner-div" data-corenum="29">
				<p class="text-center">7</p>
			</div>
		</div>
		<div class="col-xs-1 memory-core">
			<div class="inner-div" data-corenum="30">
				<p class="text-center">8</p>
			</div>
		</div>
		<div class="col-xs-1 memory-core">
			<div class="inner-div" data-corenum="31">
				<p class="text-center">9</p>
			</div>
		</div>
		<div class="col-xs-1 memory-core">
			<div class="inner-div" data-corenum="32">
				<p class="text-center">10</p>
			</div>
		</div>
		<div class="col-xs-1 memory-core">
			<div class="inner-div" data-corenum="33">
				<p class="text-center">11</p>
			</div>
		</div>
		<div class="col-xs-1 memory-core">
			<div class="inner-div" data-corenum="34">
				<p class="text-center">12</p>
			</div>
		</div>
	</div>

	<div id="popup-holder">
		<div id="score-popup">
			<h2 class="text-center" id="level">Level: 1</h2>
			<h2 class="text-center" id="score">Score: 0</h2>
		</div>
	</div>
@stop

@section('bottom-script')
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="/js/hal.js"></script>
@stop