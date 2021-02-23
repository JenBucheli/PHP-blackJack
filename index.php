<?php

require_once 'Player.php';
require_once 'Blackjack.php';
require_once 'Card.php';
require_once 'Deck.php';
require_once 'Suit.php';
require_once 'Dealer.php';

session_start();
if(isset($_SESSION['cardsGame'])){
    $game= $_SESSION['cardsGame'];
}else{
    $game=new Blackjack();

    var_dump($_POST['actionPlayer']);
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
