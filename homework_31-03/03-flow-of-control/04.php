<?php

$day = (int) readline("Enter a number from 0 to 6: ");
switch ($day) {
    case 0:
        echo "Monday";
        break;
    case 1:
        echo "Tuesday";
        break;
    case 2:
        echo "Wednesday";
        break;
    case 3:
        echo "Thursday";
        break;
    case 4:
        echo "Friday";
        break;
    case 5:
        echo "Saturday";
        break;
    case 6:
        echo "Sunday";
        break;
    default:
        echo "Not a valid day";
}




