@extends('layouts.master')

@section('content')
<?php
// starts session for game
session_start();

// destroys the session if the user comes from a different webpage or if they have pressed the playagain button at the end of the game
if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] != 'http://cameronholland.me/connect-four.php') {
	session_destroy();
	session_start();
} elseif(isset($_POST['playagain'])) {
	session_destroy();
	session_start();
}

// object that holds all the info for the game
class Board {
	public $gameboard;											// array for gameboard
	public $blackgamepiece = 'img/black-connect-four.jpg';		// holds image location for a spot holding a black game piece
	public $redgamepiece = 'img/red-connect-four.jpg';			// holds image location for a spot holding a red game piece
	public $blanklocation = 'img/empty-connect-four.jpg';		// holds image location for a spot that does not have a game piece
	public $turnCount = 1;										// keeps track of what turn it is, odd turns are black's turn and even are red's

	// constructs an empty board when an instance of Board is created
	public function __construct() {
		$this->gameboard = array();
		for ($i=0; $i < 6; $i++) { 		// loops through six times giving the board a 6 row board and 7 columns
			$this->gameboard[] = array($this->blanklocation, $this->blanklocation, $this->blanklocation, $this->blanklocation, $this->blanklocation, $this->blanklocation, $this->blanklocation);
		}
	}

	// function that displays the board in html
	public function displayBoard() {
		foreach ($this->gameboard as $ycoord => $row) {
			// creates div for each row
			echo "<div class='row'>";
			foreach ($row as $xcoord => $location) {
				// in each row this makes 7 divs for each column
				echo "<div class='col-md-1' style='padding: 0px 3px;'><img class='img-responsive' src='{$location}' /></div>";
			}
			echo "</div>";
		}
	}

	// function that places each users piece in the appropriate row for the column they selected
	public function placePiece($col) {
		$temp = '';
		// finds the lowest position for the users piece to drop to
		foreach ($this->gameboard as $key => $row) {
			if ($row[$col] === 'img/empty-connect-four.jpg') {
				$temp = $key;
			}
		}

		// checks to make sure the location is numberic or it will not increase the turn count or place a piece
		if (is_numeric($temp) && ($this->turnCount%2 === 0)) {
			$this->gameboard[$temp][$col] = $this->redgamepiece;
			$this->turnCount++;
		} elseif (is_numeric($temp) && ($this->turnCount%2 === 1)) {
			$this->gameboard[$temp][$col] = $this->blackgamepiece;
			$this->turnCount++;
		}
	}

	// checks to see if there is a win on the board by calling each direction's function
	public function checkForWin() {
		$win = FALSE;
		// iterates through every location on the board and only checks the ones that are not empty
		foreach ($this->gameboard as $rownum => $row) {
			foreach ($row as $colnum => $location) {
				if ($location !== $this->blanklocation) {
					if ($this->checkDiagonalBottomToTop()) {			// calls the function for checking for diagonal wins and if it returns true, it returns true and sets the session variable to true
						$_SESSION['win'] = TRUE;
						return TRUE;
					} elseif ($this->checkVertical()) {					// calls the function for checking for vertical wins and if it returns true, it returns true and sets the session variable to true
						$_SESSION['win'] = TRUE;
						return TRUE;
					} elseif ($this->checkHorizontal()) {				// calls the function for checking for horizontal wins and if it returns true, it returns true and sets the session variable to true
						$_SESSION['win'] = TRUE;
						return TRUE;
					} elseif ($this->checkDiagonalTopToBottom()) {		// calls the function for checking for diagonal wins and if it returns true, it returns true and sets the session variable to true
						$_SESSION['win'] = TRUE;
						return TRUE;
					}
				} 
			}
		}
		return $win;
	}

	// function for checking for horizontal wins and if it finds one it returns true
	public function checkHorizontal() {
		foreach ($this->gameboard as $rownum => $row) {
			foreach ($row as $colnum => $location) {
				if ($location !== $this->blanklocation) {
					if (($rownum <= 3) && ($this->gameboard[$rownum + 1][$colnum] === $location) && ($this->gameboard[$rownum + 2][$colnum] === $location) && ($this->gameboard[$rownum + 3][$colnum] === $location)) {
						return TRUE;
					} elseif (($rownum >= 3) && ($this->gameboard[$rownum - 1][$colnum] === $location) && ($this->gameboard[$rownum - 2][$colnum] === $location) && ($this->gameboard[$rownum - 3][$colnum] === $location)) {
						return TRUE;
					}
				}
			}
		}
		return FALSE;
	}

	// function for checking for vertical wins and if it finds one it returns true
	public function checkVertical() {
		foreach ($this->gameboard as $rownum => $row) {
			foreach ($row as $colnum => $location) {
				if ($location !== $this->blanklocation) {
					if (($colnum <= 3) && ($this->gameboard[$rownum][$colnum + 1] === $location) && ($this->gameboard[$rownum][$colnum + 2] === $location) && ($this->gameboard[$rownum][$colnum + 3] === $location)) {
						return TRUE;
					} elseif (($colnum >= 3) && ($this->gameboard[$rownum][$colnum - 1] === $location) && ($this->gameboard[$rownum][$colnum - 2] === $location) && ($this->gameboard[$rownum][$colnum - 3] === $location)) {
						return TRUE;
					}
				}
			}
		}
		return FALSE;
	}

	// function for checking for diagonal(going from top to bottom) wins and if it finds one it returns true
	public function checkDiagonalTopToBottom() {
		foreach ($this->gameboard as $rownum => $row) {
			foreach ($row as $colnum => $location) {
				if ($location !== $this->blanklocation) {
					if (($rownum <= 3 && $colnum <= 3) && ($this->gameboard[$rownum + 1][$colnum + 1] === $location) && ($this->gameboard[$rownum + 2][$colnum + 2] === $location) && ($this->gameboard[$rownum + 3][$colnum + 3] === $location)) {
						$_SESSION['win'] = TRUE;
						return TRUE;
					} elseif (($rownum >= 3 && $colnum >= 3) && ($this->gameboard[$rownum - 1][$colnum - 1] === $location) && ($this->gameboard[$rownum - 2][$colnum - 2] === $location) && ($this->gameboard[$rownum - 3][$colnum - 3] === $location)) {
						$_SESSION['win'] = TRUE;
						return TRUE;
					}
				}
			}
		}
		return FALSE;
	}

	// function for checking for diagonal(going from bottom to top) wins and if it finds one it returns true
	public function checkDiagonalBottomToTop() {
		foreach ($this->gameboard as $rownum => $row) {
			foreach ($row as $colnum => $location) {
				if ($location !== $this->blanklocation) {
					if (($rownum >= 3 && $colnum <= 3) && ($this->gameboard[$rownum - 1][$colnum + 1] === $location) && ($this->gameboard[$rownum - 2][$colnum + 2] === $location) && ($this->gameboard[$rownum - 3][$colnum + 3] === $location)) {
						$_SESSION['win'] = TRUE;
						return TRUE;
					} elseif (($rownum <= 3 && $colnum >= 3) && ($this->gameboard[$rownum + 1][$colnum - 1] === $location) && ($this->gameboard[$rownum + 2][$colnum - 2] === $location) && ($this->gameboard[$rownum + 3][$colnum - 3] === $location)) {
						$_SESSION['win'] = TRUE;
						return TRUE;
					}
				}
			}
		}
		return FALSE;
	}

	// function that returns who's turn it is based on what turn number it is. also if a player has won it returns who won
	public function playerColor() {
		if ($_SESSION['win']) {
			$this->turnCount-=1;
		}
		if ($this->turnCount%2 === 0) {
			return 'RED';
		} else {
			return 'BLACK';
		}
	}
}

// sets up a new instance of board if one has not been created
if (empty($_SESSION['gameboard'])) {
	$_SESSION['gameboard'] = new Board();
}

// if the user has selected a column to place their game piece
if (isset($_GET['drop']) && is_numeric($_GET['drop'])) {
	$_SESSION['gameboard']->placePiece($_GET['drop']);
	header("Location: connect-four.php");
	exit(0);
}

?>

<div class='container main-container'>
		<div class="page-header">
			<h1>Connect Four <small>Coded by Cameron Holland</small></h1>
		</div>
		<?php if (!($_SESSION['gameboard']->checkForWin())) { ?>
			<div class='row'>
				<?php foreach ($_SESSION['gameboard']->gameboard[0] as $key => $row): ?>
					<?= "<div class='col-md-1' style='padding: 0px 3px 3px; text-align: center;'><a href='connect-four.php?drop=$key'>" . ($key + 1) . "</a></div>" ?>
				<?php endforeach ?>
			</div>
		<?php } ?>
		<?php $_SESSION['gameboard']->displayBoard(); ?>
		<div class='row'>
			<?php if ($_SESSION['gameboard']->checkForWin()) { ?>
				<?= "<h1>GAME OVER. " . $_SESSION['gameboard']->playerColor() . " WINS!</h1>"; ?>
				<form method='POST' action=''>
					<button class='btn-md btn-success' name="playagain" type="submit" value="yes" autofocus="autofocus">Play Again</button>
				</form>
			<?php } else { ?>
				<?=	"<h3>" . $_SESSION['gameboard']->playerColor() . "'s Turn</h3>" ?>
			<?php } ?>
		</div>
	</div>

@stop