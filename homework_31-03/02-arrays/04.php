<?php

$firstArray = [];
for($i = 0; $i<10; $i++){
    $firstArray[] = rand(1, 100);
}

$secondArray = $firstArray;
$firstArray[count($firstArray)-1] = -7;

echo "Array 1: ".implode(', ', $firstArray).PHP_EOL;
echo "Array 2: ".implode(', ', $secondArray).PHP_EOL;