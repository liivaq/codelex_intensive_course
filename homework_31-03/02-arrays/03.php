<?php

$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2265, 1457, 2456
];

$value = readline("Enter the value to search for: ");
echo in_array($value, $numbers) ? "Value you entered exists" : "Value you entered doesn't exist";