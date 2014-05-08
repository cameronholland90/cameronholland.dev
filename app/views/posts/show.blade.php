@extends('layouts.master')

@section('tab-title')
	<title>show.blade.php</title>

@stop

@section('content')
    	<h1>Specific Post</h1>
    	@if (Session::has('successMessage'))
		    <div class="alert alert-success dif-col">{{{ Session::get('successMessage') }}}</div>
		@endif
		@if (Session::has('errorMessage'))
		    <div class="alert alert-danger dif-col">{{{ Session::get('errorMessage') }}}</div>
		@endif
    	<h3>
    		{{{ $post->title }}}<br>
    		<small>
    			Written by: {{{ $post->user->first_name . ' ' . $post->user->last_name }}} on {{ $post->created_at->format('l, F jS Y @ h:i A'); }}
    		</small>
    	</h3>
    	<img src="/{{ $post->image_location }}" />
    	<p> {{{ $post->body }}} </p>

    	@if (Auth::check())
    		<a href="#" id='btnDeletePost' class='btn-sm btn-danger'>Delete</a> | <a href="{{{ action('PostsController@edit', $post->id) }}}" class='btn-sm btn-primary'>Edit</a><br>
	    	{{ Form::open(array('action' => array('PostsController@destroy', $post->id), 'method' => 'delete', 'id' => 'formDeletePost')) }}
	    	{{ Form::close() }}
    	@endif
    	<a href="{{{ action('PostsController@index') }}}" class='btn btn-default'>Back to all Posts</a>

    	<div id="disqus_thread"></div>
	    <script type="text/javascript">
	        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
	        var disqus_shortname = 'cameronblog'; // required: replace example with your forum shortname

	        /* * * DON'T EDIT BELOW THIS LINE * * */
	        (function() {
	            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
	            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
	            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
	        })();
	    </script>
	    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
	    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
    


@stop

@section('bottom-script')
	<script>
		$('#btnDeletePost').on('click', function(e) {
			e.preventDefault();
			if (confirm('Are you sure you want to delete this post?')) {
				$('#formDeletePost').submit();
			};
		});
	</script>

@stop