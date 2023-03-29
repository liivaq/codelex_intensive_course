<?php

//Slot machine

$board_rows = 3;
$board_columns = 4;
$symbols = [ "7"=> 7, "A" => 5, "K" => 4, "Q" => 3, "J" => 2];

function generateBoard (int $BOARD_ROWS,int $BOARD_COLUMNS,array $SYMBOLS):array {
    $board = [];
    for($i = 0; $i<$BOARD_ROWS; $i++){
        $board[$i] = [];
        for($j = 0; $j<$BOARD_COLUMNS; $j++){
            $board[$i][$j] = array_rand($SYMBOLS);
        }
    }
    return $board;
}

function showBoard (array $board): void{
    echo PHP_EOL;
    foreach ($board as $row){
        foreach ($row as $cell){
            echo "-$cell";
        }
        echo "-".PHP_EOL;
    }
    echo PHP_EOL;
}

function findWinningLines(array $board): array{
    $winningLines =[
        //rows
        [$board[0][0], $board[0][1], $board[0][2], $board[0][3]],
        [$board[1][0], $board[1][1], $board[1][2], $board[1][3]],
        [$board[2][0], $board[2][1], $board[2][2], $board[2][3]],
        //diagonals +corner
        [$board[0][0], $board[1][1], $board[2][2], $board[2][3]],
        [$board[2][0], $board[2][1], $board[1][2], $board[0][3]],
        [$board[0][0], $board[0][1], $board[1][2], $board[2][3]],
        [$board[2][0], $board[1][1], $board[0][2], $board[0][3]],
        //middle +both corners
        [$board[0][0], $board[1][1], $board[1][2], $board[0][3]],
        [$board[2][0], $board[1][1], $board[1][2], $board[2][3]]
    ];

    $winningSymbols =[];
    foreach($winningLines as $line){
        if(count(array_unique($line)) === 1){
            $winningSymbols[] = $line[0];
        }
    }
    return $winningSymbols;
}
echo"$$$ Ready to win some money? $$$\n   ~~~~~ GOOD LUCK! ~~~~~   ".PHP_EOL.PHP_EOL;

$wallet = null;
while (!$wallet){
    $wallet = (int) readline("Put some money in the bank: ");
    if(!is_numeric($wallet)){
        echo "Invalid input";
    }
}
$amountWon = 0;
$gamesPlayed = 0;
$spin = readline("Spin for $1? (press enter to play or type anything else to exit) ");
while ($spin === ""){
    $gamesPlayed ++;
    $wallet --;
    echo PHP_EOL;
    echo "You have: $wallet$ reminding".PHP_EOL;
    $board = generateBoard($board_rows, $board_columns, $symbols);
    showBoard($board);
    $win = findWinningLines($board);
    if($win){
        $winForSpin = 0;
        foreach($win as $money){
            $wallet += $symbols[$money];
            $winForSpin += $symbols[$money];
            $amountWon += $symbols[$money];
        }
        echo "*** You have ". count($win) ." winning line(s)! ***".PHP_EOL;
        echo "*** You won $winForSpin$ for this spin! ***".PHP_EOL;
        echo "*** You have $wallet$ ***".PHP_EOL;
    }
    if($wallet === 0){
        echo "Sorry, you've lost all your money! Come back another time.".PHP_EOL;
        exit;
    }
    $spin = readline("Spin for $1? (press enter for yes or type anything else to exit) ");
}

if($spin != ""){
    echo "*** Thanks for playing! ***".PHP_EOL;
    echo "In total you won: $amountWon$\nYou played $gamesPlayed games\nYou have $wallet $ reminding\n";
}



