<?php

//Write a program called coza-loza-woza.php which prints the numbers 1 to 110, 11 numbers per line.
// The program shall print "Coza" in place of the numbers which are multiples of 3, "Loza" for multiples of 5,
// "Woza" for multiples of 7, "CozaLoza" for multiples of 3 and 5, and so on.

for ($i = 1; $i <= 110; $i++) {
    $output = '';

    if ($i % 3 === 0) {
        $output .= 'Coza';
    }
    if ($i % 5 === 0) {
        $output .= 'Loza';
    }
    if ($i % 7 === 0) {
        $output .= 'Woza';
    }
    if ($output === '') {
        $output = $i;
    }

    echo $output . ' ';
    if ($i % 11 === 0) {
        echo "\n";
    }

}
