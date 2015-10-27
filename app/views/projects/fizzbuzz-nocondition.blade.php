@extends('layouts.master')

@section('tab-title')
	<title>Projects - FizzBuzz Without Conditionals</title>
@stop

@section('content')
	<div class="page-header">
		<h1>FizzBuzz Without Conditionals <small>Coded by Cameron Holland</small></h1>
	</div>
	<div class="row">
		<div id="fizzbuzz">
		</div>
	</div>

@stop

@section('bottom-script')
	<script src="/js/fizzbuzz.js"></script>
	<script src="/js/popup-buttons.js"></script>
@stop