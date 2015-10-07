<?php

class Blackjack extends BaseModel {

    public static function handHtml($hand, $hide_card, $card_back)
    {

        return View::make('projects.blackjack-partials.hand')->with(array('hand' => $hand, 'hide_card' => $hide_card, 'card_back' => $card_back));
    }

    public static function deckHtml($deck_count, $card_back) 
    {

        return View::make('projects.blackjack-partials.deck')->with(array('deck_count' => $deck_count, 'card_back' => $card_back));
    }
}

?>