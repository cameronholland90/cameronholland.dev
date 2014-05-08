@extends('layouts.master')

@section('tab-title')
	<title>show.blade.php</title>

@stop

@section('content')
    	<h1>All Post</h1>
    	@if (Session::has('successMessage'))
		    <div class="alert alert-success dif-col">{{{ Session::get('successMessage') }}}</div>
		@endif
		@if (Session::has('errorMessage'))
		    <div class="alert alert-danger dif-col">{{{ Session::get('errorMessage') }}}</div>
		@endif
    	@foreach ($posts as $post)
    		<h3>
                <a href="{{{ action('PostsController@show', $post->id) }}}">{{{ $post->title }}}</a><br>
                <small> Written by: {{{ $post->user->first_name . ' ' . $post->user->last_name }}} on {{ $post->created_at->format('l, F jS Y @ h:i A'); }}</small>
                </h3>
    		<p> {{{ Str::words($post->body, 10) }}} </p>
    	@endforeach
    	{{ $posts->appends(array('search' => Input::get('search')))->links() }} <br>
        @if (Auth::check())
    	   <a href="{{{ action('PostsController@create') }}}" class='btn btn-success'>Create New</a>
        @endif

@stop