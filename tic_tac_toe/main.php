<?php
//Tic-tac-toe game

function makeCell ($x, $y, $symbol = "-"): stdClass{
    $cell = new stdClass();
    $cell->x = $x;
    $cell->y = $y;
    $cell->symbol = $symbol;
    return $cell;
}

function findLine(array $line): bool{
    foreach ($line as $element) {
        if ($element->symbol === "-") {
            return false;
        }
    }
    return true;
}


$line1 = [makeCell(0,0), makeCell(1, 0), makeCell(2,0)];
$line2 = [makeCell(0,1), makeCell(1, 1), makeCell(2,1)];
$line3 = [makeCell(0,2), makeCell(1, 2), makeCell(2,2)];

$gameField = [$line1, $line2, $line3];

while(true) {
    foreach ($gameField as $line) {
        foreach ($line as $element) {
            echo $element->symbol;
        }
        echo PHP_EOL;
    }

    $playerOne = str_split(readline("Player one, place your symbol: "));
    $gameField[$playerOne[0]][$playerOne[1]]->symbol = "-";

    if(findLine($line1) || findLine($line2) || findLine($line3)){
        echo "You win!".PHP_EOL;
        exit;
    }



}



