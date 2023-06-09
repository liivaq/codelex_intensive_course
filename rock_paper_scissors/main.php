<?php

//Rock, paper, scissors game (with lizard and spock extension) where first to 3 wins;

function makeElement(string $name, array $beats): stdClass{
    $element = new stdClass();
    $element->name = $name;
    $element->beats = $beats;
    return $element;
}

$elements = [
    "rock"=>makeElement("rock", ["scissors", "lizard"]),
    "scissors"=>makeElement("scissors", ["paper", "lizard"]),
    "paper"=>makeElement("paper", ["rock", "spock"]),
    "spock"=>makeElement("spock", ["scissors", "rock"]),
    "lizard"=>makeElement("lizard", ["paper", "spock"])
];

$computerWins = 0;
$playerWins = 0;
$round = 1;

function play(): bool {
    while (true) {
        $value = strtolower(readline("Start a new game? (yes/no) ". PHP_EOL));

        if($value === "no"){
            exit;
        }

        if($value === "yes"){
            return true;
        }

        echo "--Invalid selection".PHP_EOL;
    }
}

function hasWinner(int $someonesWins, int $necessaryWins = 3): bool{
    return $someonesWins === $necessaryWins;
}

echo "******************************************" . PHP_EOL;
echo "---Rock, paper, scissors, lizard, spock---" . PHP_EOL;
echo "-------------First to 3 wins!-------------" .PHP_EOL;
echo "******************************************" . PHP_EOL;

$isPlaying = play();

while($isPlaying) {

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

    if (hasWinner($playerWins)) {
        $winner = "Player";
    }
    if (hasWinner($computerWins)) {
        $winner = "Computer";
    }

    if (isset($winner)) {
        echo "*** $winner has won the game! ***" . PHP_EOL;
        echo "__________________________________________" . PHP_EOL;
        $isPlaying = play();
        $computerWins = $playerWins = 0;
        $round = 1;
    }
}