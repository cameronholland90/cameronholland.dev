@extends('layouts.master')

@section('tab-title')
	<link rel="stylesheet" type="text/css" href="/css/connect-four.css">
@stop

@section('content')
	<div class="page-header">
		<h1>Connect Four <small>Coded by Cameron Holland</small></h1>
	</div>
	<div class="row">
		<div class="connect-four-column">
			<div class="connect-four-block">
				<div class="empty-cirle"></div>
			</div>
		</div>
	</div>

@stop

@section('bottom-script')

@stop