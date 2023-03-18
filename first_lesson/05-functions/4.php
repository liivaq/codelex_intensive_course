<?php

// Create an array of objects that uses the function of exercise 3,
// but in loop printing out if the person has reached age of 18.
function isOver18(object $person): string{
    return ($person->age >= 18) ? "$person->name is 18 or over" : "$person->name is under 18";
};
function makePerson (string $name, string $surname, int $age): stdClass{
    $person = new stdClass();
    $person->name = $name;
    $person->surname = $surname;
    $person->age = $age;
    return $person;
}

$personJohn = makePerson("John", "Doe", 55);
$personJane = makePerson("Jane", "Flinch", 34);
$personChris = makePerson("Chris P.", "Bacon", 12);

$people = [
    $personJohn,
    $personJane,
    $personChris
];

foreach ($people as $person){
    echo isOver18($person)."\n";
}