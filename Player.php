<?php
declare(strict_types=1);

require_once 'Blackjack.php';
require_once 'Deck.php';

class Player
{
    //properties
    private array $cards=[];
    private bool $lost= false;

    //constructor
    // Deck represents "extends to Deck class" so we can have access to its methods.
    public function __construct(Deck $deck)
    {

      //array_push($this->cards,$deck->drawCard(),$deck->drawCard());
        //same as above, we do this twice cause in the game player gets 2 cards from the deck.
        array_push($this->cards, $deck->drawCard());
        array_push($this->cards, $deck->drawCard());

    }
    //methods

    //to get a card from the deck
    public function hit (Deck $deck)
    {
        array_push($this->cards,$deck->drawCard(),$deck->drawCard());
        if($this->getScore()>21){
            return $this->lost=true;
        }


    }
    //player stops trying in the game, it's equal to his lost.
    public function surrender ()
    {
        $this->lost = true;
    }
    // score begins to add from 0,
    public function getScore ()
    {
        $score = 0;
        foreach ($this->cards as $card){
            $score= $score+$card->getValue();
        }
        return $score;

    }

    public function hasLost ()
    {
        $this->lost = true;
    }
}


