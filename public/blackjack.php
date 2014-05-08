<?php

require_once('classes/blackjack-classes.php');

session_start();
if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] != 'http://cameronholland.me/blackjack.php') {
	session_destroy();
	session_start();
} elseif (isset($_POST['restart']) || ((isset($_POST['playagain']) && count($_SESSION['deck']->fullDeck) < 10))) {
	session_destroy();
	session_start();
} elseif (isset($_POST['playagain'])) {
	unset($_SESSION['player']);
	unset($_SESSION['dealer']);
	unset($_SESSION['win']);
}

if (!isset($_SESSION['deck'])) {
	$_SESSION['deck'] = new Deck();
	foreach ($_SESSION['deck']->suits as $suit) {
		foreach ($_SESSION['deck']->cards as $card) {
			$_SESSION['deck']->fullDeck[] = new Card($card, $suit);
		}
	}
	$_SESSION['deck']->shuffleDeck();
}

if (!isset($_SESSION['player']) && !isset($_SESSION['dealer'])) {
	$_SESSION['player'] = new Hand();
	$_SESSION['dealer'] = new Hand();
}

if (!isset($_POST['stay'])) {
	if (isset($_POST['hit']) && $_POST['hit'] === 'yes') {
		$_SESSION['deck']->drawCard($_SESSION['player']);
	}
} else {
	while ($_SESSION['dealer']->getScore() < 17 && ($_SESSION['dealer']->getScore() < $_SESSION['player']->getScore())) {
		$_SESSION['deck']->drawCard($_SESSION['dealer']);
	}
}

?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Revalia' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="css/carousel.css"/>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<link rel="shortcut icon" href="img/Arches v2-6.jpg" />
	<title>Blackjack</title>
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
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Projects<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="/yahtzee.php">Yahtzee</a></li>
								<li><a href="/blackjack.php">Blackjack</a></li>
								<li><a href="/connect-four">Connect Four</a></li>
								<li><a href="/whack-a-mole.html">Whack-A-Mole</a></li>
								<li><a href="/simon-says.html">Hypnotoad Says</a></li>
							</ul>
						</li>
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
	
	<div class='container main-container'>
		<div class="page-header">
			<h1>Blackjack <small>Coded by Cameron Holland</small></h1>
		</div>
		<?php $hide = TRUE; ?>
		<?php if ((($_SESSION['player']->getScore() === 21 || $_SESSION['player']->getScore() > 21) || isset($_POST['stay'])) || (isset($_SESSION['win']))) { ?>
			<?php $hide = FALSE; ?>
		<?php } ?>
		<div class='row'>
			<div class='col-md-4'>
				<h3>Player Hand <?= "Score: " . $_SESSION['player']->getScore(); ?></h3>
				<?php $_SESSION['player']->displayHand(); ?>
			</div>
			<div class='col-md-4'>
				<h3>Dealer Hand <?= "Score: " . $_SESSION['dealer']->getScore($hide); ?></h3>
				<?php $_SESSION['dealer']->displayHand($hide); ?>
			</div>
			<div class="col-md-4">
				<h3>Deck <?= "Card Count: " . count($_SESSION['deck']->fullDeck); ?></h3>
				<?php $_SESSION['deck']->displayDeck(); ?>
			</div>
		</div>
		<div class='row'>
			<div class='userstuff'>
				<?php if ((($_SESSION['player']->getScore() === 21 || $_SESSION['player']->getScore() > 21) || isset($_POST['stay'])) || (isset($_SESSION['win']))) { ?>
					<form method="POST" action="">
						<button class='btn-md btn-success' name="playagain" type="submit" value="yes" autofocus="autofocus">Play Again</button>
						<button class='btn-md btn-danger' name="restart" type="submit" value="yes">Restart Game</button>
					</form>
					<?php if ($_SESSION['dealer']->getScore() > 21) { ?>
						<h3>Player Wins! Dealer Busted!</h3>
						<?php $_SESSION['win'] = TRUE; ?>
					<?php } elseif ($_SESSION['player']->getScore() > 21) { ?>
						<h3>Dealer Wins! Player Busted!</h3>
						<?php $_SESSION['win'] = TRUE; ?>
					<?php } elseif ($_SESSION['dealer']->getScore() > $_SESSION['player']->getScore()) { ?>
						<h3>Dealer Wins!</h3>
						<?php $_SESSION['win'] = TRUE; ?>
					<?php } elseif ($_SESSION['dealer']->getScore() < $_SESSION['player']->getScore()) { ?>
						<h3>Player Wins!</h3>
						<?php $_SESSION['win'] = TRUE; ?>
					<?php } else { ?>
						<h3>Dealer Wins!</h3>
						<?php $_SESSION['win'] = TRUE; ?>
					<?php } ?>
				<?php } else { ?>
					<form method="POST" action="">
						<button class='btn-md btn-success' name="hit" type="submit" value="yes" autofocus="autofocus">Hit</button>
						<button class='btn-md btn-danger' name="stay" type="submit" value="yes">Stay</button>
					</form>
				<?php } ?>
			</div>
		</div>
	</div>
</body>
</html>