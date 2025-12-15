<?php

require_once 'src/Football.php';
require_once 'src/Chess.php';

$games = [
    new Football(),
    new Chess()
];

foreach ($games as $game) {
    echo $game->startGame() . PHP_EOL . PHP_EOL;
}
