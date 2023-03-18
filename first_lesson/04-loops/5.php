<?php

//Create an associative array with objects of multiple persons.
//Each person should have a name, surname, age and birthday.
// Using loop (by your choice) print out every persons personal data.

function makePerson (string $name, string $surname, int $age, string $birthday){
    $person = new stdClass();
    $person->name = $name;
    $person->surname = $surname;
    $person->age = $age;
    $person->birthday = $birthday;
    return $person;
}

$john = makePerson("John", "Doe", 55, "14.01.1968");
$jane = makePerson("Jane", "Birch", 23, "27.12.2000");
$bob = makePerson("Bob", "Pancakes", 31, "03.07.1992");
$nancy = makePerson("Nancy", "Leaf", 17, "06.11.2005");

$people = [
    "John"=> $john,
    "Jane"=> $jane,
    "Bob"=> $bob,
    "Nancy"=> $nancy
];

foreach ($people as $person){
    echo "$person->name $person->surname | $person->age | $person->birthday".PHP_EOL;
}