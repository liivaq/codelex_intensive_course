<?php
//Tic-tac-toe game
$playerOne = ' X ';
$playerTwo = ' O ';
$turn = $playerOne;

function makeCell ($x, $y, $symbol = " - "): stdClass{
    $cell = new stdClass();
    $cell->x = $x;
    $cell->y = $y;
    $cell->symbol = $symbol;
    return $cell;
}

function findWinningLine(array $gameBoard): bool{
    foreach ($gameBoard as $line) {
        $firstCell = $line[0];
        $winningLine = true;
        foreach ($line as $cell) {
            if ($cell->symbol === " - " || $cell->symbol != $firstCell->symbol) {
                $winningLine = false;
                break;
            }
        }
        if ($winningLine) {
            echo "The winner is: {$firstCell->symbol}".PHP_EOL;
            return true;
        }
    }
    return false;
}

$rows = [
    [makeCell(0,0), makeCell(1, 0), makeCell(2,0)],
    [makeCell(0,1), makeCell(1, 1), makeCell(2,1)],
    [makeCell(0,2), makeCell(1, 2), makeCell(2,2)],
 ];

$winningLines= [
    //rows
    [$rows[0][0], $rows[1][0], $rows[2][0]],
    [$rows[0][1], $rows[1][1], $rows[2][1]],
    [$rows[0][2], $rows[1][2], $rows[2][2]],
    //columns
    [$rows[0][0], $rows[0][1], $rows[0][2]],
    [$rows[1][0], $rows[1][1], $rows[1][2]],
    [$rows[2][0], $rows[2][1], $rows[2][2]],
    //diagonals
    [$rows[0][0], $rows[1][1], $rows[2][2]],
    [$rows[0][2], $rows[1][1], $rows[2][0]],
];

echo "***Tic-tac-toe!***\n***Place your symbol by choosing coordinates on the board (example: 01)".PHP_EOL;
$counter = 0;
while($counter<10) {
    foreach ($rows as $row) {
        foreach ($row as $cell) {
            echo $cell->symbol;
        }
        echo PHP_EOL;
    }
    if($counter === 9 && !findWinningLine($winningLines)){
        echo "It's a tie!".PHP_EOL;
        exit;
    }

    if(findWinningLine($winningLines)){
        exit;
    }

    $playersChoice = str_split(readline("Player $turn, place your symbol: "));

    if(count($playersChoice) != 2
        || !is_numeric(implode($playersChoice))
        ||$playersChoice[0]>(count($rows[0])-1)
        ||$playersChoice[1]>(count($rows[0])-1)) {
        echo"Invalid input!".PHP_EOL;
        continue;
    }

    if($rows[$playersChoice[1]][$playersChoice[0]]->symbol != ' - '){
        echo "This cell is already taken!".PHP_EOL;
        continue;
    }
    $rows[$playersChoice[1]][$playersChoice[0]]->symbol = $turn;

    $turn = $turn === $playerOne? $playerTwo : $playerOne;
    $counter++;

}
