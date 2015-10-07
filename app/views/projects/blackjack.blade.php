@extends('layouts.master')

@section('tab-title')
	<title>Projects - Blackjack</title>
	<link href='https://fonts.googleapis.com/css?family=Black+Ops+One' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="/css/blackjack.css">
@stop

@section('content')
	<div class="page-header">
		<h1>Blackjack <small>Coded by Cameron Holland</small></h1>
		<button id="rules" class="btn btn-default" data-bootboxalert="blackjack-rules">
			<i class="fa fa-info-circle"></i> Rules
		</button>
		<button class="btn btn-success" id="change-card-back">Change Card Back</button>
	</div>
	<div class="row" id="record">
		<div class="col-md-3 col-md-offset-1 text-center wins-loses">
			<h2>Wins</h2>
			<p id="wins-count">0</p>
		</div>
		<div class="col-md-3 col-md-offset-4 text-center wins-loses">
			<h2>Loses</h2>
			<p id="loses-count">0</p>
		</div>
	</div>
	<div class='row' id="game-board">
		<div class='col-md-4'>
			<div class="row">
				<h3>Player Hand Score: <span id="score-1">0</span></h3>
				<div id="hand-1" class="row"></div>
				<div id="hand-options" class="row">
					<button class="btn btn-success hit" data-handkey="1">Hit</button>
					<button class="btn btn-danger stay" data-handkey="1">Stay</button>
					<br>
					<button class="split btn btn-primary" data-handkey="1">Split</button>
				</div>
			</div>
			<div class="row" id="extra-hands">
				<h3>Player Hand Score: <span id="score-2">0</span></h3>
				<div id="hand-2" class="row"></div>
				<div id="hand-options" class="row">
					<button class="btn btn-success hit" data-handkey="2">Hit</button>
					<button class="btn btn-danger stay" data-handkey="2">Stay</button>
					<br>
					<button class="split btn btn-primary" data-handkey="2">Split</button>
				</div>
			</div>
		</div>
		<div class='col-md-4'>
			<h3>Dealer Hand Score: <span id="score-0">0</span></h3>
			<div id="hand-0" class="row"></div>
		</div>
		<div class="col-md-4">
			<h3>Deck Card Count: <span id="deck-count">52</span></h3>
			<div id="deck-display" class="row"></div>
		</div>
	</div>
	<div class="row">
		
		<div id="game-options" class="text-center">
			<button class="btn btn-success" id="start">Start Game</button>
			<button class="btn btn-success" id="deal">Deal Game</button>
			<button class="btn btn-danger" id="stop">End Game</button>
		</div>
	</div>

@stop

@section('bottom-script')
	<script type="text/javascript" src="/js/blackjack.js"></script>
	<script src="/js/popup-buttons.js"></script>
@stop