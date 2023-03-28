<?php
$BOARD_SIZE = 3;
$PLAYER_ONE = ' X ';
$PLAYER_TWO = ' O ';
$EMPTY_SYMBOL = ' - ';
$TURN = $PLAYER_ONE;
$ROUNDS = $BOARD_SIZE*$BOARD_SIZE;

function makeBoard(int $BOARD_SIZE,string $EMPTY_SYMBOL): stdClass{
    $board = new stdClass();
    $board->rows = [[]];
    $board->cell = $EMPTY_SYMBOL;

    for($i = 0; $i < $BOARD_SIZE; $i++) {
        for ($j = 0; $j < $BOARD_SIZE; $j++) {
            $board->rows[$i][$j] = $board->cell;
        }
    }
    return $board;
}

function showBoard (object $board):void{
    echo PHP_EOL;
    foreach ($board->rows as $row){
        foreach($row as $cell){
        echo "  |  $cell";
    }
        echo "  |".PHP_EOL;
    }
    echo PHP_EOL;
}

function findWinner(object $board,int $BOARD_SIZE,string $EMPTY_SYMBOL) {
    // Check rows
    for ($i = 0; $i < $BOARD_SIZE; $i++) {
        if (count(array_unique($board->rows[$i])) === 1 && $board->rows[$i][0] !== $EMPTY_SYMBOL) {
            return $board->rows[$i][0];
        }
    }

    // Check columns
    for ($j = 0; $j < $BOARD_SIZE; $j++) {
        $column = array_column($board->rows, $j);
        if (count(array_unique($column)) === 1 && $column[0] !== $EMPTY_SYMBOL) {
            return $column[0];
        }
    }

    // Check diagonals (can't figure out how to make this dynamic)
    $diagonal1 = [$board->rows[0][0], $board->rows[1][1], $board->rows[2][2]];
    if (count(array_unique($diagonal1)) === 1 && $diagonal1[0] !== $EMPTY_SYMBOL) {
        return $diagonal1[0];
    }

    $diagonal2 = [$board->rows[0][2], $board->rows[1][1], $board->rows[2][0]];
    if (count(array_unique($diagonal2)) === 1 && $diagonal2[0] !== $EMPTY_SYMBOL) {
        return $diagonal2[0];
    }

    return false;
}

$board = makeBoard($BOARD_SIZE, $EMPTY_SYMBOL);

$counter = 0;
echo"*** Tic-tac-toe ***\n\nPlace your symbol, choosing coordinates on the board (example 02)\n";
while(true){
    showBoard($board);
    $winner = findWinner($board, $BOARD_SIZE, $EMPTY_SYMBOL);
    if($winner){
        echo "*** $winner wins ***".PHP_EOL;
        exit;
    }
    if($counter === $ROUNDS){
        echo "*** It's a tie! ***".PHP_EOL;
        exit;
    }

    echo"*** It's $TURN turn ***".PHP_EOL;

    $playerChoice = str_split(readline("Place your symbol: "));

    if(count($playerChoice) != 2
        || !is_numeric(implode($playerChoice))
        ||$playerChoice[0]>(count($board->rows[0])-1)
        ||$playerChoice[1]>(count($board->rows[0])-1)
        ||$board->rows[$playerChoice[1]][$playerChoice[0]] != $EMPTY_SYMBOL) {
        echo"*** Invalid input! ***".PHP_EOL;
        continue;
    }

    $board->rows[$playerChoice[1]][$playerChoice[0]] = $TURN;

    $TURN = $TURN === $PLAYER_ONE? $PLAYER_TWO : $PLAYER_ONE;
    $counter++;
}