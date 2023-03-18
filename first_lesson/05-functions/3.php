<?php

//Create a person object with name, surname and age.
// Create a function that will determine if the person has reached 18 years of age.
// Print out if the person has reached age of 18 or not.

$person = new stdClass();
$person->name = "Jane";
$person->surname = "Doe";
$person->age = 21;

function isOver18(object $person): string{
    return $person->age >= 18 ? "{$person->name} is 18 or over" : "{$person->name} is under 18";
}

echo isOver18($person);