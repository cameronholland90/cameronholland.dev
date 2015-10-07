<div class='outline shadow rounded {{ $overlay }}' style='color: {{ $cardColor }};'>
	<div class='top'>
		{{ $card['value'] . $card['suit'] }}
	</div>
	<h1 style='color: {{ $cardColor }};'>
		{{ $card['suit'] }}
	</h1>
	<div class='bottom'><br>
		{{ $card['value'] . $card['suit'] }}
	</div>
</div>