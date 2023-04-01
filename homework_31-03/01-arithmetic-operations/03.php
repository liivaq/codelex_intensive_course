<?php

//Write a program to produce the sum of 1, 2, 3, ..., to 100. Store 1 and 100 in variables lower bound and upper bound, so that we can change their values easily. Also compute and display the average. The output shall look like:
//
//The sum of 1 to 100 is 5050
//The average is 50.5

function sumAndAverage (int $min, int $max): void{
    $range = range($min, $max);
    $sum = array_sum($range);
    $average = $sum/count($range);
    echo "The sum of $min to $max is $sum.\nThe average is $average".PHP_EOL;
}

sumAndAverage(1, 100);
