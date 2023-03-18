<?php
//Create an array with integers (up to 10) and print them out using foreach loop.

$integers  = [];

for($i = 0; $i< 10; $i++){
    $integers[] = $i;
}

foreach ($integers as $integer){
    echo $integer."\n";
}