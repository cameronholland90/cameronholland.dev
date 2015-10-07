(function () {
	// hide game to wait for user to start
	$('#game-board').hide();
	$('#extra-hands').hide();
	$('.split').hide();
	$('#record').hide();
	$('#hand-options').hide();
	$('#deal').hide();
	$('#change-card-back').hide();

	// variables used for deck(creation and storing)
	var suits = ['&clubs;', '&hearts;', '&spades;', '&diams;'];
	var values = ['A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'];
	var deck = [];
	var deck_back_options = ['music-card-back.jpg', 'playing_card_back.png', 'playing_card_back2.jpg']
	var deck_back = 0;

	var wins = 0;
	var loses = 0;

	// variables used for game settings
	var deck_limit = 10;
	var blackjack_score = 21;

	// variables used for player and dealer hands
	var player_hand_key = 1;
	var dealer_hand_key = 0;
	var player_extra_hand_keys = [];
	var hands = [ [], [] ];

	var hands_done = [];

	// shows hands and hides start game button
	function showBoard() 
	{

		$('#game-board').show();
		$('#record').show();
		$('.stay').show();
		$('#hand-options').show();
		$('#change-card-back').show();
		$('#extra-hands').hide();
		$('#game-options').hide();

		$('#deal').show();
		$('#start').hide();
	}

	// updates card back to the next option
	function changeCardBack()
	{

		deck_back++;

		if (deck_back > deck_back_options.length - 1) {
			deck_back = 0;
		};

		displayHands();
		updateDeckCount();
	}

	// keeps hands visible but hides hit/stay and shows redeal
	function showEndGameBoard()
	{

		$('#hand-options').hide();
		$('#game-options').show();
	}

	// builds deck using suits and values array
	function makeDeck()
	{

		// sets deck to empty array to clear out previous deck
		deck = [];

		// loops through all suits
		for (var suit_key = 0; suit_key < suits.length; suit_key++) 
		{

			// loops through all values
			for (var value_key = 0; value_key < values.length; value_key++) 
			{
				
				// makes card object to be used for calculating hand score
				var card = {
					value: values[ value_key ],
					suit: suits[ suit_key ]
				};

				// pushes card object into deck array
				deck.push( card );
			};
		};

		// calls shuffle deck function
		shuffleDeck();
	}

	// clears player and dealer hands array from previous game
	function clearHands()
	{

		for (var hand_key = hands.length - 1; hand_key >= 0; hand_key--) 
		{

			hands[hand_key] = [];
		};
	}

	function splitHand()
	{

		var hand = hands[player_hand_key];
		var new_hand_key = player_hand_key + 1;
		player_extra_hand_keys.push( new_hand_key );

		hands.push([]);
		var newHand = hands[ new_hand_key ];

		newHand.push( hand.shift() );

		$('.split').hide();

		dealCard( player_hand_key );
		dealCard( new_hand_key );

		displayHands();
		$('#extra-hands').show();
	}

	function checkForSplit()
	{
		var card1 = hands[player_hand_key][0];
		var card2 = hands[player_hand_key][1];

		if ( getCardValueInt( card1 ) == getCardValueInt( card2 ) ) 
		{
			$('.split').show();
		}
	}

	// removes win or lose alert from the page
	function removeAlert()
	{

		$('.alert').remove();
	}

	// checks dealer deck for a soft seventeen (ex: A + 6 || A + 3 + 3)
	function checkForSoftSeventeen()
	{

		// holds count for aces in dealer hand
		var ace_count = 0;

		// goes through hand and counts the aces
		for (var card_key = hands[ dealer_hand_key ].length - 1; card_key >= 0; card_key--) 
		{

			if ( hands[ dealer_hand_key ][card_key]['value'] == 'A' )
			{

				ace_count++;
			}
		};

		// if only once ace is found, it is a soft seventeen
		// function only called when hand score equals 17
		if (ace_count == 1) 
		{

			return true;
		};

		return false;
	}

	// shuffles deck array
	function shuffleDeck()
	{

	  	var i = 0, 
	  		j = 0,
	  		temp = null;

	  	for (i = deck.length - 1; i > 0; i -= 1) 
	  	{

	    	j = Math.floor(Math.random() * (i + 1))
	    	temp = deck[i]
	    	deck[i] = deck[j]
	    	deck[j] = temp
	  	}
	}

	// updates card number count and deck html on page
	function updateDeckCount()
	{

		$('#deck-count').html( deck.length );

		$.ajax({
	        type: "GET",
	        url: "/ajax/blackjack-deck",
	        data: { 
	        	deck_count	: deck.length,
	        	card_back 	: deck_back_options[deck_back]
	        }
	    }).done(function( data ) {

	    	$('#deck-display').html( data );
	    });
	}

	// checks a hand to see if they busted(>21)
	function checkForBust(hand_key)
	{

		if ( getHandScore( hand_key ) > blackjack_score ) 
		{

			return true;
		}
		else
		{

			return false;
		}
	}

	// checks to see if player got blackjack, 
	// only if true checks dealer hand for blackjack
	// if dealer has blackjack dealer wins
	// if only player has blackjack player wins
	// if blackjack is not found then game continues
	function checkForEndGame()
	{

		var player_blackjack = false;
		var dealer_blackjack = false;

		for (var hand_key = hands.length - 1; hand_key >= 0; hand_key--) 
		{

			if ( getHandScore( hand_key ) == blackjack_score && hand_key == dealer_hand_key )
			{

				dealer_blackjack = true;
			}
			else if ( getHandScore( hand_key ) == blackjack_score ) 
			{

				player_blackjack = true;
			} 
		};

		if ( player_blackjack && dealer_blackjack ) 
		{

			endGame( 'Dealer Wins With Blackjack', false );
		}
		else if ( player_blackjack ) 
		{

			endGame( 'Player Wins With Blackjack', true );
		}
	}

	function checkForPlayerTurnEnd()
	{

		if ( ( hands_done.indexOf( player_hand_key ) != -1 ) && ( ( hands_done.indexOf( player_extra_hand_keys[0] ) != -1 ) || player_extra_hand_keys.length == 0 ) ) 
		{

			return true;
		}

		return false;
	}

	// returns the numerical value of the card to be used for the score
	function getCardValueInt(card, hand_score)
	{

		var card_score;

		// all face cards equal 10, aces equal 11 or 1 and the rest are their number value
		if ( card['value'] == 'J' || card['value'] == 'Q' || card['value'] == 'K' ) 
		{

			card_score = 10;
		} 
		else if (  card['value'] == 'A' ) 
		{

			if ( hand_score > 10 ) 
			{

				card_score = 1;
			} 
			else 
			{

				card_score = 11;
			};
		} 
		else 
		{

			card_score = parseInt(card['value']);
		}

		return card_score;
	}

	// returns the numerical score of a hand
	function getHandScore(hand_key)
	{
		var hand_score = 0;
		var card_score = 0;
		var full_ace_count = 0;

		for (var i = hands[hand_key].length - 1; i >= 0; i--) 
		{
			card_score = getCardValueInt( hands[hand_key][i], hand_score );
			if ( card_score == 11 ) 
			{

				full_ace_count++;
			};
			hand_score += card_score;
		};

		if ( hand_score > blackjack_score && full_ace_count != 0 ) 
		{

			hand_score = hand_score - ( full_ace_count * 10 );
		}

		return hand_score;
	}

	// updates the score displayed for a hand(?? if dealer)
	function updateHandScore(hand_key, hidden)
	{
		
		var hand_score = getHandScore( hand_key );

		if ( hidden ) 
		{

			hand_score = '??';
		}

		$('#score-' + hand_key).html( hand_score );
		return hand_score;
	}

	// updates the html for a hand
	function displayHand(hand_key, hide_card) 
	{

		$.ajax({
	        type: "GET",
	        url: "/ajax/blackjack-card",
	        data: { 
	        	hand 		: hands[hand_key],
	        	hide_card 	: hide_card,
	        	card_back 	: deck_back_options[deck_back]
	        }
	    }).done(function( data ) {

	    	$('#hand-' + hand_key).html( data );
	    });
	}

	// calls displayHand for each hand
	function displayHands()
	{

		for (var hand_key = hands.length - 1; hand_key >= 0; hand_key--) 
		{

			var hide_card = ((hand_key == dealer_hand_key)? true : false);
			displayHand( hand_key, hide_card );
		};
	}

	// deals one card to hand specified
	function dealCard(hand_key)
	{

		var dealt_card = deck.shift();
		var hidden_card = ((hand_key == dealer_hand_key)? true : false);
		hands[ hand_key ].push( dealt_card );

		updateHandScore( hand_key, hidden_card );
	}

	// runs game setup
	function setupGame()
	{

		showBoard();

		// loops through twice so each player gets 2 cards
		for (var i = 1; i <= 2; i++) 
		{

			// goes through each hand and calls deal card function for that hand
			for (var hand_key = 0; hand_key < hands.length; hand_key++) 
			{

				dealCard( hand_key );
			};
		};

		// checkForSplit();
		displayHands();
		updateDeckCount();
	}

	// starts game
	function startGame()
	{

		// clears previous game data if any
		clearHands();
		removeAlert();

		// checks to see if a new deck is needed
		if ( deck.length < deck_limit ) 
		{

			// calls make deck function that also shuffles the deck
			makeDeck();	
		};

		// sets up the game
		setupGame();

		// waits for ajax and other functions to finish
		setTimeout( checkForEndGame, 500 );
	}

	function updateWinsLosesCount()
	{

		$('#wins-count').html( wins );
		$('#loses-count').html( loses );
	}

	// runs end game functions to show message and reveal dealer hand
	function endGame(message, player_won)
	{
		
		var alert_type;
		if ( ! player_won ) 
		{

			alert_type = 'danger';
			loses++;
		} 
		else
		{

			alert_type = 'success';
			wins++;
		}

		$.ajax({
	        type: "GET",
	        url: "/ajax/alert-message",
	        data: { 
	        	alert_message	: message,
	        	alert_type		: alert_type
	        }
	    }).done(function( data ) {

			$('div.page-header').after( data );
	    });

	    displayHand( dealer_hand_key, false );
		updateHandScore( dealer_hand_key, false );
		updateWinsLosesCount();

		showEndGameBoard();
	}

	// runs the turn for the dealer
	function runDealerTurn()
	{

		var hand_score;
		var player_hand_score = getHandScore( player_hand_key );
		var stay = false;

		while ( true )
		{

			hand_score = getHandScore( dealer_hand_key );

			if ( hand_score > blackjack_score )
			{

				endGame( 'Player Wins. Dealer Busts', true );
				break;
			}
			else if ( hand_score == blackjack_score && hands[dealer_hand_key].length == 2 )
			{

				endGame( 'Dealer Wins With Blackjack', false );
				break;
			}
			else if ( hand_score > player_hand_score )
			{

				endGame( 'Dealer Wins.', false );
				break;
			}
			else if ( hand_score == 17 && checkForSoftSeventeen() ) 
			{

				dealCard( dealer_hand_key );
			}
			else if ( hand_score < 17 ) 
			{

				dealCard( dealer_hand_key );
			}
			else 
			{

				endGame( 'Player Wins.', true );
				break;
			}
		}
	}


	$(document).on('click', '#start', startGame);
	$(document).on('click', '#deal', startGame);
	$(document).on('click', '#change-card-back', changeCardBack);
	$(document).on('click', '.split', splitHand);
	$(document).on('click', '.hit', function() {

		var hand_key = $(this).data('handkey');

		dealCard( hand_key );
		displayHand( hand_key, false );
		updateDeckCount();

		var bust = checkForBust( hand_key );

		if ( bust ) 
		{

			busted_hands.push( hand_key );
			// endGame( 'Dealer Wins. Player Busts.', false );
		}
	});
	$(document).on('click', '.stay', function() {

		var hand_key = $(this).data('handkey');
		hands_done.push( hand_key );
		$(this).hide();

		if ( checkForPlayerTurnEnd() ) 
		{

			runDealerTurn();
		};
	})
})();