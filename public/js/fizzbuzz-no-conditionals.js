// fizzbuzz without conditionals
var number = function(iteration, number) 
{

	console.log('iteration: ' + iteration);
	console.log('number: ' + number);
	console.log('answer: ' + iteration * number);
	return (iteration * 15) + number;
}
var fizz = function(iteration, number) 
{

	return 'Fizz';
}
var buzz = function(iteration, number) 
{

	return 'Buzz';
}
var fizzbuzz = function(iteration, number) 
{

	return 'FizzBuzz';
}
var fizzdiv = $('#fizzbuzz');
var display;
var fizzarray = ['number','number','fizz','number','buzz','fizz','number','number','fizz','buzz','number','fizz','number','number','fizzbuzz'];
var functionName = '';

for (var i = 0; i < 10; i++) 
{

	for (var j = 0; j < 15; j++) 
	{

		functionName = fizzarray[j];
		display = window[ functionName ]( i, j + 1 );
		fizzdiv.append('<p>' + display + '</p>');
	};
};