@foreach($hand as $key => $card)
	@if($card['suit'] == '&clubs;' || $card['suit'] == '&spades;')
		<?php $cardColor = 'black'; ?>
	@else
		<?php $cardColor = 'red'; ?>
	@endif

	@if($key == 0)
		<?php $overlay = null; ?>
	@else
		<?php $overlay = 'overlay'; ?>
	@endif

	@if($hide_card == 'true' && ! $overlay)
		@include('projects.blackjack-partials.facedown-card')
	@else
		@include('projects.blackjack-partials.card')
	@endif

@endforeach