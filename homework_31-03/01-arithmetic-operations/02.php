<?php

//Write a program called CheckOddEven which prints "Odd Number" if the int variable “number” is odd, or “Even Number” otherwise. The program shall always print “bye!” before exiting.w

function checkOddEven (int $number): void {
    echo $number%2 === 0 ? "Even Number" : "Odd Number";
    echo "\nbye!";
}

checkOddEven(5);