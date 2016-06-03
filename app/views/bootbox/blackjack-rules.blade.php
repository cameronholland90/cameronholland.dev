@extends('bootbox.layouts.master')

@section('content')
	<h2 class="text-center">The Rules</h2>
	<ul>
		<li>Dealer will hit on soft 17(ex: A + 6 or A + 3 + 3)</li>
		<li>Dealer will stay on hard 17 and hand with value above 17</li>
		<li>Dealer wins if both Player and Dealer get Blackjack</li>
		<li>In event of tie, Player wins</li>
	</ul>
	<hr>
	<h2 class="text-center">Things To Come</h2>
	<ul>
		<li>Betting(fake money)</li>
		<li>Split</li>
		<li>Double Down</li>
	</ul>
@stop