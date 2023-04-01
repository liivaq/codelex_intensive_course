<?php

//Write a program that reads a positive integer and count the number of digits the number has.

$number = null;
while (!$number){
    $choice = (int) readline("Enter a number: ");
    if($choice < 0 || is_int($number)){
        echo "Invalid input. Enter a positive integer".PHP_EOL;
        continue;
    }
    $number = $choice;
}

echo "The digit count of entered number is: ".strlen($number).PHP_EOL;