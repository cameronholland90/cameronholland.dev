$(document).ready(function() {

	var hal = {
		beep_audio:					$('#beep').get(0),
		breath_audio:				$('#breath').get(0),
		error_audio:				$('#error').get(0),
		woop_audio:					$('#woop').get(0),
		daisy_audio:				$('#daisy').get(0),
		difficult_audio:			$('#difficult').get(0),
		goodbye_audio:				$('#goodbye').get(0),
		start_audio:				$('#start-game').get(0),

		progress_sounds: 			[ $('#cant-allow').get(0), $('#hal-afraid').get(0), $('#hal-fault').get(0), $('#hal-puzzling').get(0), $('#hal-upset').get(0), $('#hal-sorry').get(0), $('#hal-odd').get(0) ],

		start_button:				$('#start'),
		score_board:				$('#popup-holder'),
		difficulty_buttons_cont:	$('#difficulties'),
		difficulty_buttons: 		$('.difficulty'),
		quit_button: 				$('#quit'),
		memory_cores: 				$('.memory-core .inner-div'),

		easy: 						null,
		medium: 					null,
		hard: 						null,

		spaces_used: 				null,

		answerSequence: 			[],

		userInputActive: 			false,
		turn: 						0,
		score: 						0,
		level: 						1,
		game_over: 					false,

		breathInterval: 			null,

		time_shown: 				1000,

		setupDifficultys: function() 
		{

			this.easy = [13, 14, 15, 16, 17, 18, 19, 20, 21, 22];
			this.medium = this.easy.concat( [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12] );
			this.hard = this.medium.concat( [23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34] );

			this.setupDifficultyListener();
		},

		setPickedDifficulty: function()
		{

			var active_difficulty = $('.difficulty.active');
			active_difficulty.each(function() {

				hal.spaces_used = hal[ $(this).data('difficulty') ];
			})

			this.difficulty_buttons.hide();
		},

		setupDifficultyListener: function()
		{

			this.difficulty_buttons.on('click', function() {
				$('.difficulty.active').removeClass('active');
				$(this).addClass('active');
				if ( $(this).data('difficulty') == 'hard' ) 
				{

					hal.difficult_audio.play();
				};
			})
		},

		initializeBoard: function() 
		{

			this.setupDifficultys();

			this.quit_button.hide();

			this.score_board.hide();

			this.start_button.click( this.startGame );

			this.setupUserInput();

			this.quit_button.click(function() {

				$(this).hide();
				hal.start_button.show();
				hal.difficulty_buttons.show();
				hal.removeBreathAudio();
				hal.goodbye_audio.play();
				setTimeout(function() {

					hal.daisy_audio.play();
				}, 1000)
			})
		},

		startGame: function() 
		{

			hal.answerSequence = [];
			hal.score = 0;
			hal.level = 1;
			hal.game_over = false;

			hal.start_audio.play();
			hal.setPickedDifficulty();

			hal.newLevel();
			hal.updateScore();
			hal.updateLevel();

			hal.breath_audio.play();
			hal.breathInterval = setInterval(function() {

				hal.breath_audio.play();
			}, 97000)

			$(this).hide();
			hal.quit_button.show();
			hal.score_board.hide();
		},

		newLevel: function(){
			
			this.turn = 0;
			
			this.addToSequence(); //randomize memory core with the correct amount of numbers for this level
			this.displaySequence(); //show the user the sequence
		},

		updateScore: function(){							//display current score on screen
			$('#score').text('Score: ' + this.score);
		},

		updateLevel: function(){							//display current score on screen
			$('#level').text('Level: ' + this.level);
		},

		displaySequence: function()
		{

			this.answerSequence.forEach(function( memory_core_number, index ) {

				setTimeout(function() {

					hal.beep_audio.play();
					hal.lightupSection( memory_core_number, 1 );
				}, ( (hal.time_shown * (index + 1)) ) );
			});

			setTimeout(function() {
				hal.userInputActive = true;
			}, ( (hal.time_shown * (hal.answerSequence.length + 1)) ))
		},

		setupUserInput: function()
		{

			this.memory_cores.click(function() {

				if (hal.userInputActive) 
				{

					hal.beep_audio.play();
					hal.lightupSection( $(this).data('corenum'), 1 );
					hal.checkSequence( $(this).data('corenum') );
				};
			});
		},

		getRandomProgressSound: function() 
		{

			var random_number = Math.floor(Math.random() * (this.progress_sounds.length - 1));
			return this.progress_sounds[random_number]
		},

		checkSequence: function(memory_core)
		{			

			//checker function to test if the memory core the user pressed was next in the sequence
			if(memory_core !== this.answerSequence[this.turn])
			{	
					
				this.incorrectSequence();
			}
			else
			{

				this.score++;
				this.updateScore();
				this.turn++;
			}

			if(this.turn === this.answerSequence.length)
			{	

				if (this.turn % 5 == 0) {
					var random_sound = this.getRandomProgressSound();
					random_sound.play();
				};
				
				//if completed the whole sequence
				this.level++;							//increment level, display it, disable the memory cores wait 1 second and then reset the game
				this.updateLevel();
				this.userInputActive = false;

				setTimeout(function(){
					hal.newLevel();
				},1000);
			}
		},

		lightupSection: function(memory_core_number, times_repeat)
		{

			if (times_repeat > 0) {

				var memory_core = $('[data-corenum="' + memory_core_number + '"]');
				memory_core.animate({

					opacity: '1'
				}, 50).animate({

					opacity: '.3'
				}, hal.time_shown);	

				times_repeat--;
			}

			if (times_repeat > 0) 
			{

				hal.lightupSection( memory_core_number, times_repeat );
			}
			else if ( hal.game_over )
			{

				this.woop_audio.play();

				setTimeout(function() {

			    	hal.error_audio.play();
				}, 4000);
			}
		},

		incorrectSequence: function()
		{						

			var correct_core = this.answerSequence[this.turn];
			this.game_over = true;
			
			this.userInputActive = false;
			this.updateLevel();
			this.updateScore();

			this.lightupSection( correct_core, 4 );

			this.quit_button.hide();
			this.start_button.show();
			this.score_board.show();
			this.difficulty_buttons.show();

			this.removeBreathAudio();
		},

		removeBreathAudio: function()
		{

			clearInterval(hal.breathInterval);
			this.breath_audio.pause();
		    this.breath_audio.currentTime = 0;
		},

		addToSequence: function() 
		{			
	
			//generate random numbers and push them to the generated number array iterations determined by current level
			var addnum = hal.spaces_used[ Math.floor(Math.random() * this.spaces_used.length) ];
			this.answerSequence.push( addnum );
		}
	}

	hal.initializeBoard();
});