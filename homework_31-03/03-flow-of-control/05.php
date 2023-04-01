<?php

$input = strtoupper(readline("Write something: "));

foreach (str_split($input) as $letter) {
    switch ($letter) {
        case "A":
        case "B":
        case "C":
            echo "2";
            break;
        case "D":
        case "E":
        case "F":
            echo "3";
            break;
        case "G":
        case "H":
        case "I":
            echo "4";
            break;
        case "J":
        case "K":
        case "L":
            echo "5";
            break;
        case "M":
        case "N":
        case "O":
            echo "6";
            break;
        case "P":
        case "Q":
        case "R":
        case "S":
            echo "7";
            break;
        case "T":
        case "U":
        case "V":
            echo "8";
            break;
        case "W":
        case "X":
        case "Y":
        case "Z":
            echo "9";
            break;
        default:
            echo "Invalid input";
    }
}