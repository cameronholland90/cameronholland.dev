@extends('layouts.master')

@section('top-script')
	<title>Add Post Form</title>
	<link rel="stylesheet" href="//cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
@stop

@section('content')
		@if ($edit)
			<div class="page-header">
				<h1>Edit Post</h1>
			</div>
    		{{ Form::open(array('action' => array('PostsController@update', $post->id), 'class' => 'form-horizontal', 'method' => 'put', 'files' => true)) }}
    	@else
    		<div class="page-header">
				<h1>Create Post</h1>
			</div>
    		{{ Form::open(array('action' => 'PostsController@store', 'class' => 'form-horizontal', 'files' => true)) }}
    	@endif

    	<div class='form-group'>
    		{{ $errors->has('title') ? $errors->first('title', '<p><span class="help-block">:message</span></p>') : '' }}
	    	{{ Form::label('title', 'Title', array('class' => 'col-sm-2 control-label')) }}
	    	<div class='col-sm-10'>
	    		@if ($edit)
					{{ Form::text('title', $post->title, array('class' => 'form-control', 'placeholder' => 'Title')) }}
				@else
					{{ Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'Title')) }}
				@endif
			</div>
		</div>
		<div class='form-group'>
			{{ $errors->has('body') ? $errors->first('body', '<p><span class="help-block">:message</span></p>') : '' }}
			{{ Form::label('body', 'Body', array('class' => 'col-sm-2 control-label')) }}
			<div class='col-sm-10'>
				@if ($edit)
					{{ Form::textarea('body', $post->body, array('class' => 'form-control simplemde', 'placeholder' => 'Body')) }}
				@else
					{{ Form::textarea('body', null, array('class' => 'form-control simplemde', 'placeholder' => 'Body')) }}
				@endif
			</div>
		</div>
		{{-- <div class='form-group'>
			{{ Form::label('tags', 'Tags', array('class' => 'col-sm-2 control-label')) }}
			<div class='col-sm-10'>
				{{ Form::textarea('tags', null, array('class' => 'form-control', 'id' => 'tags')) }}
			</div>
		</div> --}}
		<div class='form-group'>
			{{ Form::label('image', 'Upload Image', array('class' => 'col-sm-2 control-label')) }}
			<div class='col-sm-10')>
				{{ Form::file('image') }}
			</div>
		</div>
		<div class='col-sm-10'>
			{{ Form::submit('Save Post', array('class' => 'btn btn-default')); }}
		</div>
		{{ Form::close() }}

@stop

@section('bottom-script')
	<script src="//cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
	<script>
		$('#tags').tagsInput();

		var simplemde = new SimpleMDE({ element: $('.simplemde')[0] });
	</script>


@stop