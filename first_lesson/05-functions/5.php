<?php

// Create a 2D associative array in 2nd dimension with fruits and their weight.
// Create a function that determines if fruit has weight over 10kg.
// Create a secondary array with shipping costs per weight.
// Meaning that you can say that over 10 kg shipping costs are 2 euros, otherwise its 1 euro.
// Using foreach loop print out the values of the fruits and how much it would cost to ship this product.

$fruits = [
    [
        "name" => "Bananas",
        "weight" => 2,
    ],
    [
        "name" => "Apples",
        "weight" => 12,
    ],
    [
        "name" => "Oranges",
        "weight" => 23,
    ]
];

$shippingCosts = [
    "under10" => 1,
    "over10" => 2
];

function weightOver10 (int $weight): bool{
    return $weight > 10;
}

foreach ($fruits as $fruit){
    echo "{$fruit["name"]} weight: {$fruit["weight"]} kg, shipping cost: ";
    echo weightOver10($fruit["weight"])? "{$shippingCosts["over10"]}$\n" : "{$shippingCosts["under10"]}$\n";
}
