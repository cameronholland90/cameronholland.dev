@extends('layouts.master')

@section('tab-title')
	<title>Login Form</title>
	
@stop

@section('content')
    	{{ Form::open(array('action' => 'UsersController@doLogin', 'class' => 'form-signin')) }}
    		@if (Session::has('errorMessage'))
			    <div class="alert alert-danger dif-col">{{{ Session::get('errorMessage') }}}</div>
			@endif

			<h2 class="form-signin-heading">Please sign in</h2>
				{{ $errors->has('email') ? $errors->first('email', '<p><span class="help-block">:message</span></p>') : '' }}
				{{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Email or Username')) }}

				{{ $errors->has('password') ? $errors->first('password', '<p><span class="help-block">:message</span></p>') : '' }}
				{{ Form::password('password', array('placeholder' => 'Password', 'class' => 'form-control')) }}
			<br>
			{{ Form::submit('Sign in', array('class' => 'btn btn-lg btn-primary btn-block')); }}

		{{ Form::close() }}
    

@stop