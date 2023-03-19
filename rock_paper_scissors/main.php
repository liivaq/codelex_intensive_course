<?php

//Rock, paper, scissors game (with lizard and spock extension) where first to 3 wins;

function makeElement(string $name, array $beats): stdClass{
    $element = new stdClass();
    $element->name = $name;
    $element->beats = $beats;
    return $element;
}
$rock = makeElement("rock", ["scissors", "lizard"]);
$scissors = makeElement("scissors", ["paper", "lizard"]);
$paper = makeElement("paper", ["rock", "spock"]);
$spock = makeElement("spock", ["scissors", "rock"]);
$lizard = makeElement("lizard", ["paper", "spock"]);

$elements = [
    "rock"=>$rock,
    "scissors"=>$scissors,
    "paper"=>$paper,
    "spock"=>$spock,
    "lizard"=>$lizard
];
$play = '';
$computerWins = 0;
$playerWins = 0;
$round = 1;

function play():string{
    global $play;
    $value = strtolower(readline("Start a new game? (yes/no) ". PHP_EOL));

    if($value === "no" || $value === "yes"){
        return $play = $value;
    }
    echo "--Invalid selection".PHP_EOL;
    return play();
};

function restart(){
    global $computerWins, $playerWins, $round;
    $computerWins = 0;
    $playerWins = 0;
    $round = 1;
};

echo "******************************************" . PHP_EOL;
echo "---Rock, paper, scissors, lizard, spock---" . PHP_EOL;
echo "-------------First to 3 wins!-------------" .PHP_EOL;
echo "******************************************" . PHP_EOL;

play();

while($play === "yes" && $computerWins != 3 && $playerWins != 3) {
    echo "              ***ROUND $round***". PHP_EOL;
    $playersChoice = strtolower(readline("Choose your element: "));
    $computersChoice = $elements[array_rand($elements)];
    echo "__________________________________________". PHP_EOL;

    if (!array_key_exists($playersChoice, $elements)) {
        echo "Invalid element!". PHP_EOL;
        continue;
    }

    $playersChoice = $elements[$playersChoice];
    echo "---Your choice: $playersChoice->name" . PHP_EOL;
    echo "---Computers choice: $computersChoice->name" . PHP_EOL;
    echo "__________________________________________" . PHP_EOL;

    if ($playersChoice === $computersChoice) {
        $round++;
        echo "It's a tie!" . PHP_EOL;
        echo "__________________________________________". PHP_EOL;
        continue;
    }

    if (in_array($playersChoice->name, $computersChoice->beats)) {
        $computerWins++;
        echo "--Computer wins!" . PHP_EOL;
    } else {
        $playerWins++;
        echo "--You win!" . PHP_EOL;
    }
    echo "__________________________________________". PHP_EOL;
    echo "--Player: $playerWins\n--Computer: $computerWins".PHP_EOL;
    echo "__________________________________________". PHP_EOL;

    $round++;

    if ($playerWins === 3){
        echo "*** Player has won the game! ***".PHP_EOL;
        echo "__________________________________________". PHP_EOL;
        restart();
        play();
    }elseif($computerWins === 3){
        echo "*** Computer has won the game! ***".PHP_EOL;
        echo "__________________________________________". PHP_EOL;
        restart();
        play();
    }
}


