<?php
$BOARD_SIZE = 3;
$PLAYER_ONE = ' X ';
$PLAYER_TWO = ' O ';
$EMPTY_SYMBOL = ' - ';
$TURN = $PLAYER_ONE;
$ROUNDS = $BOARD_SIZE*$BOARD_SIZE;

function makeBoard($BOARD_SIZE, $EMPTY_SYMBOL): stdClass{
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

function showBoard ($board){
    foreach ($board->rows as $row){
        foreach($row as $cell){
        echo $cell;
    }
        echo PHP_EOL;
    }
}

function findWinningLine($winningLines, $empty): bool {
    foreach ($winningLines as $lines) {
        foreach ($lines as $line) {
            if (count(array_unique($line)) === 1 && $line[0] !== $empty) {
                echo $line[0] . ' wins!';
                return true;
            }
        }
    }
    return false;
}

function updateWinningLines(&$winningLines, $playerChoice, $TURN, $BOARD_SIZE)
{
    $winningLines["columns"][$playerChoice[0]][$playerChoice[1]] = $TURN;
    $winningLines["rows"][$playerChoice[1]][$playerChoice[0]] = $TURN;

    if ($playerChoice[0] === $playerChoice[1]) {
        $winningLines["diagonals"][0][$playerChoice[0]] = $TURN;
    }

    if ($playerChoice[0] + $playerChoice[1] === $BOARD_SIZE - 1) {
        $winningLines["diagonals"][1][$playerChoice[0]] = $TURN;
    }
}

$board = makeBoard($BOARD_SIZE, $EMPTY_SYMBOL);
$rows = $board->rows;

$winningLines = [
    "rows"=> $rows,
    "columns"=>[
        [$rows[0][0], $rows[0][1], $rows[0][2]],
        [$rows[1][0], $rows[1][1], $rows[1][2]],
        [$rows[2][0], $rows[2][1], $rows[2][2]]
    ],
    "diagonals"=>[
        [$rows[0][0], $rows[1][1], $rows[2][2]],
        [$rows[0][2], $rows[1][1], $rows[2][0]]
    ]
];
$counter = 0;
echo"***Tic-tac-toe***\n--Place your symbol, choosing coordinates on the board (example 02)\n\n";
while($counter < $ROUNDS){
    showBoard($board);
    if(findWinningLine($winningLines, $EMPTY_SYMBOL)){
        exit;
    }
    echo("It's $TURN turn!".PHP_EOL);

    $playerChoice = str_split(readline("Place your symbol: "));

    if(count($playerChoice) != 2
        || !is_numeric(implode($playerChoice))
        ||$playerChoice[0]>(count($rows[0])-1)
        ||$playerChoice[1]>(count($rows[0])-1)) {
        echo"Invalid input!".PHP_EOL;
        continue;
    }
    $board->rows[$playerChoice[1]][$playerChoice[0]] = $TURN;

    updateWinningLines($winningLines, $playerChoice, $TURN, $BOARD_SIZE);

    $TURN = $TURN === $PLAYER_ONE? $PLAYER_TWO : $PLAYER_ONE;
    $counter++;

}