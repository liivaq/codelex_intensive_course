<?php

// Game of Hangman - guess a random word, you lose after 3 wrong guesses;

$wrong1 = "     +-------+\n             |\n             |\n             |\n             |\n             |\n";
$wrong2 = "     +-------+\n     |       |\n     0       |\n    /|       |\n             |\n             |\n";
$wrong3 = "     +-------+\n     |       |\n     0       |\n    /|\      |\n    / \      |\n             |\n";

$words = ["falafel", "hiking", "pistachio", "programming", "lullaby"];
$wordToGuess = str_split($words[array_rand($words)]);
$hiddenWord = str_split(str_repeat("_", count($wordToGuess)));

echo"*** Welcome to Hangman! Can you guess the word? ***".PHP_EOL;
echo implode(" ", $hiddenWord).PHP_EOL;

$wrongGuesses = 0;

while($wrongGuesses < 3){
    $guess = trim(strtolower(readline("Guess a letter: ")));

    if (strlen($guess) != 1 ||preg_match("/[^a-z]+/", $guess)){
        echo "Invalid guess! Enter one letter.".PHP_EOL;
        continue;
    }

    if(!in_array($guess, $wordToGuess)){
        $wrongGuesses++;
    }

    if(in_array($guess, $hiddenWord)){
        echo "You have already guessed this letter!".PHP_EOL;
        continue;
    }

    $letterPlacement = array_keys($wordToGuess, $guess);

    foreach ($letterPlacement as $letter){
        $hiddenWord[$letter] = $guess;
    }

    $result = implode(' ', $hiddenWord);
    echo $result.PHP_EOL;
    echo "Wrong guesses: $wrongGuesses".PHP_EOL;

    switch ($wrongGuesses){
        case 1:
            echo $wrong1;
            break;
        case 2:
            echo $wrong2;
            break;
        case 3:
            echo "YOU LOSE! The word to guess was: ". implode('', $wordToGuess)."\n$wrong3";
    }

    if($result === implode(' ', $wordToGuess)){
        echo "--Congrats! You have guessed the word correctly!".PHP_EOL;
        exit;
    }
}

