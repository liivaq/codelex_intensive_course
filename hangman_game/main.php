<?php

// Game of Hangman - guess a random word, you lose after 3 wrong guesses;

$words = ["falafel", "hiking", "pistachio", "programming", "lullaby"];
$wordToGuess = $words[array_rand($words)];
$hiddenWord = str_repeat("_", strlen($wordToGuess));

$guessArray = str_split($wordToGuess);
$hiddenArray = str_split($hiddenWord);

echo"Welcome to Hangman! Can you guess the word?".PHP_EOL;
echo implode(" ", $hiddenArray).PHP_EOL;

$wrongGuesses = 0;
while($wrongGuesses < 4){

    $guess = trim(strtolower(readline("Guess a letter: ")));
    if(!in_array($guess, $guessArray)){
        $wrongGuesses++;
    }

    $guessedIndexes = array_keys($guessArray, $guess);
    foreach ($guessedIndexes as $index){
        $hiddenArray[$index] = $guess;
    }

    $result = implode(' ', $hiddenArray);
    echo $result.PHP_EOL;
    echo "Wrong guesses: $wrongGuesses".PHP_EOL;

    if($result === implode(' ', $guessArray)){
        echo "You have guessed the word correctly!".PHP_EOL;
        exit;
    };

}

