// fizzbuzz without a loop
'use strict'

$(document).ready(function() {

	var number = 1;
	var fizzdiv = $('#fizzbuzz');
	var fizzbuzz = function() 
	{

		var display = number;
		if ( number % 15 == 0 ) 
		{

			display = 'FizzBuzz';
		}
		else if ( number % 3 == 0 )
		{

			display = 'Fizz';
		}
		else if ( number % 5 == 0 )
		{

			display = 'Buzz';
		}
		fizzdiv.append('<p>' + display + '</p>');

		number++;
		if ( number <= 100 ) 
		{

			fizzbuzz();
		}
	}
	fizzbuzz();
});
