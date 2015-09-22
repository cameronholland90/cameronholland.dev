@extends('layouts.master')

@section('tab-title')
	<title>Add Post Form</title>

@stop

@section('content')
		@if ($edit)
			<h1>Edit Post</h1>
    		{{ Form::open(array('action' => array('PostsController@update', $post->id), 'class' => 'form-horizontal', 'method' => 'put', 'files' => true)) }}
    	@else
			<h1>Create Post</h1>
    		{{ Form::open(array('action' => 'PostsController@store', 'class' => 'form-horizontal', 'files' => true)) }}
    	@endif


    	@if (Session::has('successMessage'))
		    <div class="alert alert-success dif-col">{{{ Session::get('successMessage') }}}</div>
		@endif
		@if (Session::has('errorMessage'))
		    <div class="alert alert-danger dif-col">{{{ Session::get('errorMessage') }}}</div>
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
					{{ Form::textarea('body', $post->body, array('class' => 'form-control', 'placeholder' => 'Body')) }}
				@else
					{{ Form::textarea('body', null, array('class' => 'form-control', 'placeholder' => 'Body')) }}
				@endif
			</div>
		</div>
		<div class='form-group'>
			{{ Form::label('tags', 'Tags', array('class' => 'col-sm-2 control-label')) }}
			<div class='col-sm-10'>
				{{ Form::textarea('tags', null, array('class' => 'form-control', 'id' => 'tags')) }}
			</div>
		</div>
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
	<script>
		$('#tags').tagsInput();
	</script>
    

@stop