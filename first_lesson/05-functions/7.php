<?php

// Imagine you own a gun store. Only certain guns can be purchased with license types.
// Create an object (person) that will be the requester to purchase a gun (object)
// Person object has a name, valid licenses (multiple) & cash.
// Guns are objects stored within an array.
// Each gun has license letter, price & name.
// Using PHP in-built functions determine if the requester (person) can buy a gun from the store.

$person = new stdClass();
$person->name = "Joe";
$person->licence = ["A", "B"];
$person->cash = 70000;
$person->inventory = [];

function makeWeapon (string $name, string $licence, int $price): stdClass {
    $weapon = new stdClass();
    $weapon->name = $name;
    $weapon->licence = $licence;
    $weapon->price = $price;
    return $weapon;
}

$shotgun = makeWeapon("Shotgun", "A", 50000);
$pistol = makeWeapon("Pistol", "B", 20000);
$sniperRifle = makeWeapon("Sniper Rifle", "Z", 90000);
$knife = makeWeapon("Knife", "A", 10000);
$machineGun = makeWeapon("Sub-machine gun", "Q", 80000);

$weapons = [
    "shotgun"=>$shotgun,
    "pistol"=>$pistol,
    "sniper"=>$sniperRifle,
    "knife"=>$knife,
    "machine"=>$machineGun
];

$cash = $person->cash/100;
$licences = implode(", ", $person->licence);

echo "Welcome to our gun store, $person->name! You have $cash$ and licences: $licences ".PHP_EOL;
echo "-----------------------------------------------".PHP_EOL;

echo "We offer: ".PHP_EOL;

foreach ($weapons as $key=>$weapon){
    $price = $weapon->price / 100;
    echo "[$key] $weapon->name | price: $price$ | necessary licence: $weapon->licence".PHP_EOL;
}
echo "-----------------------------------------------".PHP_EOL;

function buy(){
    $answer = strtolower(readline("Would you like to buy something? "));

    if($answer === "yes"){
        return true;
    }

    if($answer === "no"){
        exit;
    }

    echo "Invalid choice".PHP_EOL;
    return buy();
}

$buy = buy();

while($buy) {
    $weaponChoice = strtolower(readline("Make your choice:  ".PHP_EOL));

    if (!array_key_exists($weaponChoice, $weapons)) {
        echo "Invalid weapon!".PHP_EOL;
        buy();
        continue;
    }

    $weaponChoice = $weapons[$weaponChoice];

    if (!in_array($weaponChoice->licence, $person->licence)) {
        echo "Sorry, you don't have the correct licence". PHP_EOL;
        buy();
        continue;
    }

    if ($weaponChoice->price > $person->cash) {
        echo "Sorry, you don't have enough money". PHP_EOL;
        buy();
        continue;
    }
    echo "-----------------------------------------------" . PHP_EOL;
    echo "You bought a $weaponChoice->name!" . PHP_EOL;

    $person->inventory[] = $weaponChoice;
    $cash = ($person->cash -= $weaponChoice->price) / 100;
    echo "You have $cash$ left over and these weapons in your inventory:".PHP_EOL;
    foreach($person->inventory as $weapon){
        echo "--- $weapon->name".PHP_EOL;
    }
    buy();
}




