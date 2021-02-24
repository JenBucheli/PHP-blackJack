<?php

require_once 'Player.php';
require_once 'Blackjack.php';
require_once 'Card.php';
require_once 'Deck.php';
require_once 'Suit.php';
require_once 'Dealer.php';

session_start();


$newGame= new Blackjack();
$deck= $newGame->getDeck();
$dealer=$newGame->getDealer();
$player = $newGame->getPlayer();


if(isset($_SESSION['cardsGame'])){
    $game= $_SESSION['cardsGame'];
}else{
    $game=new Blackjack();


}

if (!isset($_POST['actionPlayer'])) {
    echo 'Welcome!' . '<br/>';


// get the button:1st with the name and identify it by it's value.
}elseif ($_POST['actionPlayer'] === 'hit') {

    $player->hit($deck);
    echo 'You: ' .$player->getScore() .'<br>';

    echo 'Dealer: '.$dealer->getScore().'<br>';

    if($player->getScore() >= $dealer->getScore()){

        echo 'You are the winner';
    }elseif($player->getScore()<$dealer->getScore()){
        echo 'Dealer wins';
    }else{
        return 'still in the game';
    }


    //var_dump($player);
}elseif ($_POST['actionPlayer']==='stand'){
    //connect with hit ----> $dealer->hit($deck);
    echo "player stand";


    //var_dump($dealer);
}elseif ($_POST['actionPlayer']==='surrender'){
    $player = $newGame->getPlayer();
    $player->hasLost();
    echo 'You lose';
}


?>

<!
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action="index.php" method="post">
    <input type="submit"  value="hit" name="actionPlayer">
    <input type="submit"  value="stand" name="actionPlayer">
    <input type="submit"  value="surrender" name="actionPlayer">
</form>

</body>
</html>


