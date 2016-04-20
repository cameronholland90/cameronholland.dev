<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/css/jquery.tagsinput.css">
	<link rel="stylesheet" type="text/css" href="/css/stylesheet.css">
	<link rel="shortcut icon" href="/img/Arches v2-6.jpg" />

	<link href='http://fonts.googleapis.com/css?family=Revalia' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="/css/stylesheet.css" type="text/css" />
	<link rel="stylesheet" href="/css/simon-style.css" type="text/css" />
	<title>Simon Says</title>
</head>
<body>
	@include('layouts.partials.navbar')

	<div class='lower'>
		<div class='wrapper'>
			<h1 class='page-header'>HYPNOTOAD SAYS</h1>
		</div>
		<div class="wrapper">
			<div class="back">
				<div class="pad shape1" data-pad="1">
					<img id='fry' src="/img/hypnotoad-says/Fry_Head.png"/>
					<audio preload="auto" class="sound1">
						<source src="/sounds/mp3/sounds_01.mp3" type="audio/mpeg"/>
						<source src="/sounds/ogg/sounds_01.ogg" type="audio/ogg"/>
					</audio>
				</div>
				<div class="pad shape2" data-pad="2">
					<img id='leela' src="/img/hypnotoad-says/leela_head.png"/>
					<audio preload="auto" class="sound2">
						<source src="/sounds/mp3/sounds_02.mp3"  type="audio/mpeg"/>
						<source src="/sounds/ogg/sounds_02.ogg" type="audio/ogg"/>
					</audio>
				</div>
				<div class="pad shape3" data-pad="3">
					<img id='professor' src="/img/hypnotoad-says/professor-farnsworth-head.png"/>
					<audio preload="auto" class="sound3">
						<source src="/sounds/mp3/sounds_03.mp3" type="audio/mpeg"/>
						<source src="/sounds/ogg/sounds_03.ogg" type="audio/ogg"/>
					</audio>
				</div>
				<div class="pad shape4" data-pad="4">
					<img id='bender' src="/img/hypnotoad-says/bender_head.png"/>
					<audio preload="auto" class="sound4">
						<source src="/sounds/mp3/sounds_04.mp3" type="audio/mpeg"/>
						<source src="/sounds/ogg/sounds_04.ogg" type="audio/ogg"/>
					</audio>
				</div>
				<div class="circle"><img class='toad' src="/img/hypnotoad-says/hypno-toad.gif"/></div>
			</div>

			<div class="level">
				<h2>Level: 1</h2>
			</div>
			<div class="score">
				<h2>Score: 0</h2>
			</div>

			<ul class="difficulty">

				<li>
					<input type="radio" class="difOpt" name="difficulty" id='diff1' value="2"/><label for='diff1'> Easy </label>
				</li>
				<li>
					<input type="radio" class="difOpt" name="difficulty" id='diff2' value="1" checked/><label for='diff2'> Normal </label>
				</li>
				<li>
					<input type="radio" class="difOpt" name="difficulty" id='diff3' value="0.5"/><label for='diff3'> Hard </label>
				</li>
				<li>
					<input type="radio" class="difOpt" name="difficulty" id='diff4' value="0.25"/><label for='diff4'> Insane </label>
				</li>
			</ul>
			<div class="sButton">
				<button class="start btn btn-success">START</button>
			</div>
		</div>
	</div>

	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script type="/js/simon-script.js"></script>
</body>
</html>