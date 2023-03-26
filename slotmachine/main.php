<?php

//Slot machine

$BOARD_ROWS = 3;
$BOARD_COLUMNS = 4;
$SYMBOLS = ["7", "A", "K", "Q", "J"];
$SYMBOL_VALUES = [ "7"=> 7, "A" => 5, "K" => 4, "Q" => 3, "J" => 2];
$MONEY = 100;

function generateBoard (int $BOARD_ROWS,int $BOARD_COLUMNS,array $SYMBOLS):array {
    $board = [];
    for($i = 0; $i<$BOARD_ROWS; $i++){
        $board[$i] = [];
        for($j = 0; $j<$BOARD_COLUMNS; $j++){
            $board[$i][$j] = $SYMBOLS[rand(0, (count($SYMBOLS)-1))];
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
    $winningSymbols =[];
    $winningLines = [
        ["00", "01", "02", "03"],
        ["10", "11", "12", "13"],
        ["20", "21", "22", "23"],
        ["00", "11", "22", "23"],
        ["20", "21", "12", "03"],
        ["00", "01", "12", "23"],
        ["20", "11", "02", "03"],
        ["00", "10", "20"],
        ["01", "11", "21"],
        ["02", "12", "22"],
        ["03", "13", "23"],
    ];

    for($i = 0; $i<count($winningLines); $i++){
        $winningLine = $winningLines[$i];
        $symbols = [];
        foreach($winningLine as $cell){
            $x = str_split($cell)[1];
            $y = str_split($cell)[0];
            $symbols[]= $board[$y][$x];
        }
        if(count(array_unique($symbols)) === 1){
            $winningSymbols[] = $symbols[0];
        }
    }
    return $winningSymbols;
}

echo"$$$ Ready to win some money? $$$\n   ~~~~~ GOOD LUCK! ~~~~~   ".PHP_EOL.PHP_EOL;
$spin = readline("Spin for $1? (press enter to play or type anything else to exit) ");
while ($spin === ""){
    $MONEY --;
    echo PHP_EOL;
    echo "*** You have: $MONEY$ in total".PHP_EOL;
    $board = generateBoard($BOARD_ROWS, $BOARD_COLUMNS, $SYMBOLS);
    showBoard($board);
    $win = findWinningLines($board);
    if($win){
        $winForSpin = 0;
        foreach($win as $money){
            $MONEY += $SYMBOL_VALUES[$money];
            $winForSpin += $SYMBOL_VALUES[$money];
        }
        echo "*** You have ". count($win) ." winning line(s)!".PHP_EOL;
        echo "*** You won $winForSpin$ for this spin!".PHP_EOL;
    }
    if($MONEY === 0){
        echo "Sorry, you've lost all your money! Come back another time.".PHP_EOL;
        exit;
    }
    $spin = readline("Spin for $1? (press enter for yes or type anything else to exit) ");
}



