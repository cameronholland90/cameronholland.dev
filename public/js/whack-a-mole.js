$(document).ready(function() {
	var interval;
	var gameTime;
	var start = false;
	var count = 0;
	// var missCount = -1;
	var highscore = 0;
	var holes = $('.hole');
	var moleMove;
	var timer = 30;
	var gameStart = document.createElement('audio');
	var bonk = document.createElement('audio');
	gameStart.setAttribute('src', '/sounds/captain-caveman-yell.mp3');
	bonk.setAttribute('src', '/sounds/bonk.mp3');
	
	function game() {
		$('.hole').children().fadeOut();
		// missCount++;
		var rand = Math.floor(Math.random() * holes.length);
		$(holes[rand]).children().fadeIn();
		// console.log(missCount);
	};
	
	$('#count').html(count.toString());

	$('.hole').hide();
	$('#game-over').hide();
	$('#playing').hide();
	$('#start-game').show();
	$('#start-game').click(function() {
		gameStart.play();
		interval = 1500;
		$(this).hide();
		$('.hole').show();
		$('#playing').show();
		$('#game-over').hide();
		moleMove = setInterval(game, interval);
		console.log(interval);
		gameTime = setInterval(function() {
			$('#timer').html("Time Left: " + timer.toString());
			timer--;
		}, 950);

		setTimeout(function() {
			clearInterval(moleMove);
			$('.hole').hide();
			$('#playing').hide();
			$('#game-over').show();
			$('#start-game').show();
			if (highscore < count) {
				highscore = count;
				$('#highscore').html("High Score: " + highscore.toString());
			};
			$('#end-score').html('<p>Your Score was ' + count.toString() + '</p><p>Highscore is ' + highscore.toString() + '</p>');
			start = false;
			count = 0;
			clearInterval(gameTime);
			timer = 30;
			$('#count').html(count.toString());
		}, 30000);
	});

	$('.hole').children().click(function() {
		bonk.play();
		$(this).hide();
		count++;
		$('#count').html(count.toString());

		if ((count !== 0) && (count % 5 === 0)) {
			clearInterval(moleMove);
			interval -= 250;
			console.log(interval);
			moleMove = setInterval(game, interval);
		};
		// missCount--;
	});

});