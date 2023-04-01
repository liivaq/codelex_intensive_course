<?php

//Write a program to accept two integers and return true if either one is 15 or if their sum or difference is 15.

function is15(int $num1, int $num2): bool
{
    return ($num1 | $num2) === 15 || $num1 + $num2 === 15 || abs($num1 - $num2) === 15;
}

var_dump(is15(22, 7));