<?php declare(strict_types=1);

require_once 'Car.php';
require_once 'FuelGauge.php';
require_once 'OdoMeter.php';

$car = new Car(new FuelGauge(0), new Odometer(999900));

while (true) {
    $amountToFill = null;
    while ($amountToFill === null) {
        $amount = (int)readline('Enter amount of fuel to fill (l): ');
        if ($amount > $car->getTankSize()) {
            echo 'Error! Your car\'s tank size is only ' . $car->getTankSize() . ' l.' . PHP_EOL;
            continue;
        }
        if ($amount === 0) {
            echo 'You sure about the amount? That won\'t get you far' . PHP_EOL;
            continue;
        }
        $amountToFill = $amount;
    }
    $car->getFuelGauge()->fillTank($amountToFill);
    echo 'Tank filled. You have ' . $car->getFuelGauge()->getFuelLevel() . ' l of fuel' . PHP_EOL;

    $drive = null;
    while ($drive !== 1) {
        $userInput = readline('Press [1] to drive or [2] to exit: ');
        switch ($userInput) {
            case 1:
                $drive = 1;
                break;
            case 2;
                echo 'Bye!' . PHP_EOL;
                exit;
            default:
                echo 'Wrong input!' . PHP_EOL;
        }
    }

    while ($car->getFuelGauge()->getFuelLevel() !== 0) {
        $car->drive();
        echo "Current mileage is: {$car->getOdometer()->getMileage()} km\n";
        echo "Amount of fuel left: {$car->getFuelGauge()->getFuelLevel()} l\n";
    }

    echo '*** You ran out of fuel! Fill up to continue driving ***' . PHP_EOL;

}
