<?php

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

function play():string{
    global $play;
    $value = strtolower(readline("Play? (yes/no) ". PHP_EOL));

    if($value === "no" || $value === "yes"){
        return $play = $value;
    }
    echo "Invalid selection".PHP_EOL;
    return play();
};

echo "------------------------------------------" . PHP_EOL;
echo "Game: Rock, paper, scissors, lizard, spock" . PHP_EOL;
echo "------------------------------------------" . PHP_EOL;

play();

while($play === "yes") {
    $playersChoice = strtolower(readline("Choose your element: "));
    $computersChoice = $elements[array_rand($elements)];

    if (!array_key_exists($playersChoice, $elements)) {
        echo "Invalid element!". PHP_EOL;
        play();
        continue;
    }

    $playersChoice = $elements[$playersChoice];
    echo "---Your choice: $playersChoice->name" . PHP_EOL;
    echo "---Computers choice: $computersChoice->name" . PHP_EOL;
    echo "------------------------------------------" . PHP_EOL;

    if ($playersChoice === $computersChoice) {
        echo "It's a tie!" . PHP_EOL;
        echo "------------------------------------------". PHP_EOL;
        play();
        continue;
    }

    if (in_array($playersChoice->name, $computersChoice->beats)) {
        echo "Computer wins!" . PHP_EOL;
    } else {
        echo "You win!" . PHP_EOL;
    }
    echo "------------------------------------------". PHP_EOL;
    play();
}


