<?php
//Tic-tac-toe game

function makeCell ($x, $y, $symbol = "-"): stdClass{
    $cell = new stdClass();
    $cell->x = $x;
    $cell->y = $y;
    $cell->symbol = $symbol;
    return $cell;
}

function findLine(array $winningLine): bool{
    foreach ($winningLine as $line) {
        foreach ($line as $cell) {
            if ($cell->symbol === "-" || $cell->symbol != $line[0]->symbol) {
                return false;
            }
        }
        echo "The winner is: {$winningLine[0][0]->symbol}".PHP_EOL;
        return true;
    }
    return true;
}

$rows = [
    [makeCell(0,0), makeCell(1, 0), makeCell(2,0)],
    [makeCell(0,1), makeCell(1, 1), makeCell(2,1)],
    [makeCell(0,2), makeCell(1, 2), makeCell(2,2)],
 ];

$columns = [
    [$rows[0][0], $rows[1][0], $rows[2][0]],
    [$rows[0][1], $rows[1][1], $rows[2][1]],
    [$rows[0][2], $rows[1][2], $rows[2][2]]
];
$diagonals = [
    [$rows[0][0], $rows[1][1], $rows[2][2]],
    [$rows[2][0], $rows[1][1], $rows[0][2]],
];

$winner = false;
while(!$winner) {
    foreach ($rows as $row) {
        foreach ($row as $cell) {
            echo $cell->symbol;
        }
        echo PHP_EOL;
    }

    $playersChoice = str_split(readline("Player one, place your symbol: "));
    if($rows[$playersChoice[1]][$playersChoice[0]]->symbol != "-"){
        echo "This cell is already taken!".PHP_EOL;
        continue;
    }

    $rows[$playersChoice[1]][$playersChoice[0]]->symbol = "X";

    if(findLine($rows) || findLine($columns) || findLine($diagonals)){
        $winner = true;
    }

    foreach ($rows as $row) {
        foreach ($row as $cell) {
            echo $cell->symbol;
        }
        echo PHP_EOL;
    }

    $playersChoice2 = str_split(readline("Player two, place your symbol: "));
    if($rows[$playersChoice2[1]][$playersChoice2[0]]->symbol != "-"){
        echo "This cell is already taken!".PHP_EOL;
        continue;
    }

    $rows[$playersChoice2[1]][$playersChoice2[0]]->symbol = "O";

    if(findLine($rows) || findLine($columns) || findLine($diagonals)){
        $winner = true;
    }

    foreach ($rows as $row) {
        foreach ($row as $cell) {
            echo $cell->symbol;
        }
        echo PHP_EOL;
    }

    if(findLine($rows) || findLine($columns) || findLine($diagonals)){
        $winner = true;
    }
}
