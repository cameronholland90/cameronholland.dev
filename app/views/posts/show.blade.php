@extends('layouts.master')

@section('top-script')
	<title>{{{ $post->title }}}</title>

@stop

@section('content')
	<div class="row">
		<div class="page-header">
	    	<h1>
	    		{{{ $post->title }}}<br>
	    		<small>
	    			Written by: {{{ $post->user->first_name . ' ' . $post->user->last_name }}} on {{ $post->created_at->format('l, F jS Y'); }}
	    		</small>
	    	</h1>
    	</div>
    	<div class="col-md-4">
    		<img src="{{ $post->image_location }}" class="img-responsive center-block" />
    	</div>
    	<div class="col-md-8 post-body">
    		{{ Markdown::string($post->body) }}
    	</div>

	</div>
	@if (Auth::check())
	<div class="row">
		<div class="col-md-12">
    		<a href="{{{ action('PostsController@edit', $post->id) }}}" class='btn btn-primary'>Edit</a> | <a href="#" id='btnDeletePost' class='btn btn-danger'>Delete</a><br>
	    	{{ Form::open(array('action' => array('PostsController@destroy', $post->id), 'method' => 'delete', 'id' => 'formDeletePost')) }}
	    	{{ Form::close() }}
    	</div>
	</div>
	@endif
	<div class="row">
		<div class="col-md-12">
    		<a href="{{{ action('PostsController@index') }}}" class='btn btn-default'>Back to all Posts</a>
    	</div>
	</div>
</div>
@include('layouts.partials.disqus')



@stop

@section('bottom-script')
	<script>
		$('#btnDeletePost').on('click', function(e) {
			e.preventDefault();
			if (confirm('Are you sure you want to delete this post?')) {
				$('#formDeletePost').submit();
			};
		});

		$('img').addClass('img-responsive');
		$('.post-body a').attr('target', '_blank');
	</script>

@stop