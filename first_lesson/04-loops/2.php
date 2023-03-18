<?php

//Create an array with integers (up to 10) and print them out using for loop.

$integers = [30, 55, 23, 3, 44, 25, 56, 27, 38, 29];

for($i = 0; $i<count($integers); $i++){
    echo $integers[$i]."\n";
}