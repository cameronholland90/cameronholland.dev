<?php $overlay = null; ?>

@for($i = 0; $i < $deck_count; $i++)

	@include('projects.blackjack-partials.facedown-card')
	<?php $overlay = 'deckoverlay'; ?>
@endfor