@extends('layouts.master')

@section('content')
	<?php

	require_once('classes/blackjack-classes.php');

	
	if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] != 'http://cameronholland.me/blackjack') {
		Session::forget('deck');
		Session::forget('player');
		Session::forget('dealer');
		Session::forget('win');
	} elseif (isset($_POST['restart']) || ((isset($_POST['playagain']) && Session::get('deck')->fullDeck) < 10))) {
		Session::forget('deck');
		Session::forget('player');
		Session::forget('dealer');
		Session::forget('win');
	} elseif (isset($_POST['playagain'])) {
		Session::forget('player');
		Session::forget('dealer');
		Session::forget('win');
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

@stop