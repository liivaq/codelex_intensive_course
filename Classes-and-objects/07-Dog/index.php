<?php
require_once 'Dog.php';

$sparky = new Dog('Sparky', 'male');
$sam = new Dog('Sam', 'male');
$lady = new Dog('Lady', 'female');
$molly = new Dog('Molly', 'female');
$rocky = new Dog('Rocky', 'male', $molly, $sam);
$max = new Dog('Max', 'male', $lady, $rocky);
$buster = new Dog('Buster', 'male', $lady, $sparky);
$coco = new Dog('Coco', 'female', $molly, $buster);

echo 'Coco\'s father is: ' . $coco->getFathersName() . PHP_EOL;
echo 'Sparky\'s father is: ' . $sparky->getFathersName() . PHP_EOL;

if ($coco->hasSameMotherAs($rocky)) {
    echo $coco->getName() . ' has the same mother as ' . $rocky->getName() . PHP_EOL;
} else {
    echo $coco->getName() . '\'s mother is ' . $coco->getMother()->getName() . PHP_EOL;
    echo $rocky->getName() . '\'s mother is ' . $rocky->getMother()->getName() . PHP_EOL;
};
