<?php
declare(strict_types=1);

require_once 'Player.php';

//Dealer is inherited from Player
class Dealer extends Player

{
    public function hit (Deck $deck)
    {
        do {
            parent::hit($deck);
        }
        while ($this->getScore() <= 15);
    }
}