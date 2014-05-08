<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src='/js/jquery.tagsinput.min.js'></script>
	<script src="/bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="/css/carousel.css"/>
	<link rel="stylesheet" type="text/css" href="/css/jquery.tagsinput.css">
	<link rel="stylesheet" type="text/css" href="/stylesheet.css">
	<link rel="shortcut icon" href="img/Arches v2-6.jpg" />
	@yield('tab-title')
</head>
<body>
	<!-- navbar -->
	<div id="navbar" class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="row">
				<div class="navbar-header">
					<a href="/resume" class="navbar-brand">CameronHolland.me</a>
					<button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div class="col-sm-3 col-md-3 navbar-right">
			        <form class="navbar-form" method="GET" action="{{{ action('PostsController@index') }}}">
				        <div class="input-group">
				            <input type="text" class="form-control" placeholder="Search Blog by Keyword" name="search" value='{{ Input::get('search') }}'>
				            <div class="input-group-btn">
				                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
				            </div>
				        </div>
			        </form>
			    </div>
				<div class="collapse navbar-collapse navHeaderCollapse nav-pills">
					<ul class="nav navbar-nav navbar-right">
						<li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{{ action('HomeController@showResume') }}}">Resume</a></li>
						<li class="{{ Request::is('portfolio') ? 'active' : '' }}"><a href="{{{ action('HomeController@showPortfolio') }}}">Portfolio</a></li>
						<!-- <li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Projects<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="yahtzee.php">Yahtzee</a></li>
								<li><a href="blackjack.php">Blackjack</a></li>
								<li><a href="connect-four.php">Connect Four</a></li>
								<li><a href="whack-a-mole.html">Whack-A-Mole</a></li>
							</ul>
						</li> -->
						<li class="{{ Request::is('posts') ? 'active' : '' }}"><a href="{{{ action('PostsController@index') }}}">Blog</a></li>
						@if (Auth::check())
							<li><a href="{{{ action('UsersController@logout') }}}">Logout</a></li>
							<li><a href="{{{ action('UsersController@edit', Auth::user()->id) }}}">{{{ Auth::user()->username }}}</a></li>
						@else
							<li class="dropdown">
								<a href="http://www.jquery2dotnet.com" class="dropdown-toggle" data-toggle="dropdown">Sign in <b class="caret"></b></a>
								<ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
									<li>
										<div class="row">
											<div class="col-md-12">
												@if (Session::has('errorMessage'))
												    <div class="alert alert-danger dif-col">{{{ Session::get('errorMessage') }}}</div>
												@endif
												{{ Form::open(array('action' => 'UsersController@doLogin', 'class' => 'form', 'id' => 'login-nav', 'accept-charset' => 'UTF-8')) }}
													<div class="form-group">
														{{ $errors->has('email') ? $errors->first('email', '<p><span class="help-block">:message</span></p>') : '' }}
														{{ Form::label('email', 'Email address', array('class' => 'sr-only')) }}
														{{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Email or Username')) }}
													</div>
													<div class="form-group">
														{{ $errors->has('password') ? $errors->first('password', '<p><span class="help-block">:message</span></p>') : '' }}
														{{ Form::label('password', 'Password', array('class' => 'sr-only')) }}
														{{ Form::password('password', array('placeholder' => 'Password', 'class' => 'form-control')) }}
													</div>
													<hr>
													<div class="form-group">
														{{ Form::submit('Sign in', array('class' => 'btn btn-success btn-block')); }}
													</div>
												{{ Form::close() }}
												<hr>
												<a href="{{{ action('UsersController@create') }}}" class='btn btn-success col-md-12'>Sign Up</a>
											</div>
										</div>
									</li>
								</ul>
							</li>
						@endif
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- end navbar -->

	@yield('carousel')

	<div class='container main-container'>

	@yield('content')

	</div>
	{{ Session::forget('successMessage'); }}
    {{ Session::forget('errorMessage'); }}

	@yield('bottom-script')
</body>
</html>