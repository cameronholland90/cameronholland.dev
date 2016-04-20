@extends('layouts.master')

@section('top-script')
	<title>Login Form</title>

@stop

@section('content')

	<div class="row">
		@if (Session::has('errorMessage'))
		    <div class="alert alert-danger dif-col">{{{ Session::get('errorMessage') }}}</div>
		@endif

		<h2 class="form-signin-heading">Please sign in</h2>
    	{{ Form::open(array('action' => 'UsersController@doLogin', 'class' => 'form-signin')) }}
    		<div class="form-group">
				{{ $errors->has('email') ? $errors->first('email', '<p><span class="help-block">:message</span></p>') : '' }}
				{{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Email or Username')) }}
			</div>
			<div class="form-group">
				{{ $errors->has('password') ? $errors->first('password', '<p><span class="help-block">:message</span></p>') : '' }}
				{{ Form::password('password', array('placeholder' => 'Password', 'class' => 'form-control')) }}
			</div>
			<div class="form-group">
				<div class="col-md-6 col-md-offset-3">
					{{ Form::submit('Sign in', array('class' => 'btn btn-lg btn-primary btn-block')); }}
				</div>
			</div>

		{{ Form::close() }}
	</div>

@stop