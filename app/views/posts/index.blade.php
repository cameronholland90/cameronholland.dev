@extends('layouts.master')

@section('top-script')
	<title>Blog Posts</title>
@stop

@section('content')
    <div class="row">
        <div class="page-header text-center">
    	   <h1>Blog Posts</h1>
        </div>
    	@foreach ($posts as $post)
            <div class="col-md-12 post">
                <div class="row">
            		<h2 class="post-title">
                        <a href="{{{ action('PostsController@show', $post->id) }}}">{{{ $post->title }}}</a><br>
                        <small> Written by: {{{ $post->user->first_name . ' ' . $post->user->last_name }}} on {{ $post->created_at->format('l, F jS Y'); }}</small>
                    </h2>
                    <div class="col-md-3">
                        <img src="{{ $post->image_location }}" class="img-responsive center-block" />
                    </div>
                    <div class="col-md-9">
            		  {{ Markdown::string(Str::words($post->body, 140)) }}
                    </div>
                </div>
            </div>
    	@endforeach
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            {{ $posts->appends(array('search' => Input::get('search')))->links() }} <br>
        </div>
        @if (Auth::check())
        <div class="col-md-12 text-center">
            <a href="{{{ action('PostsController@create') }}}" class='btn btn-custom push-down'>Create New</a>
        </div>
        @endif
    </div>
@stop