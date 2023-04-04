<?php

$digitsToLetters = [
    '2' => ['A', 'B', 'C'],
    '3' => ['D', 'E', 'F'],
    '4' => ['G', 'H', 'I'],
    '5' => ['J', 'K', 'L'],
    '6' => ['M', 'N', 'O'],
    '7' => ['P', 'Q', 'R', 'S'],
    '8' => ['T', 'U', 'V'],
    '9' => ['W', 'X', 'Y', 'Z'],
];

$input = strtoupper(readline("Write something: "));
$result = '';

for ($i = 0; $i < strlen($input); $i++) {
    $char = $input[$i];

    $digit = '';

    foreach ($digitsToLetters as $d => $letters) {
        if (in_array($char, $letters)) {
            $digit = $d;
            $count = array_search($char, $letters) + 1;
            $result .= str_repeat($digit, $count);
        }
    }
}

echo $result;

