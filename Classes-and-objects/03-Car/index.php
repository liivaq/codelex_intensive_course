<?php declare(strict_types=1);

require_once 'Car.php';
require_once 'FuelGauge.php';
require_once 'Odometer.php';

$car = new Car(new FuelGauge(0), new Odometer(999900), 70, 8);

while (true) {
    $amountToFill = null;
    while ($amountToFill === null) {
        $amount = (int)readline('Enter amount of fuel to fill (l): ');
        if ($amount > $car->getTankSize()) {
            echo 'Error! Your car\'s tank size is only ' . $car->getTankSize() . ' l.' . PHP_EOL;
            continue;
        }
        if ($amount <= 0) {
            echo 'You sure about that? That won\'t get you far.' . PHP_EOL;
            continue;
        }
        $amountToFill = $amount;
    }
    $car->getFuelGauge()->fillTank($amountToFill);
    echo 'Tank filled. You have ' . $car->getFuelGauge()->getLiters() . ' l of fuel' . PHP_EOL;

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

    while ($car->getFuelGauge()->getLiters() > $car->getFuelEconomy()/100) {
        $car->drive();
        echo "Current mileage is: {$car->getOdometer()->getMileage()} km\n";
        if($car->getFuelGauge()->getLiters() < 0){
            break;
        }
        echo "Amount of fuel left: {$car->getFuelGauge()->getLiters()} l\n";
    }

    echo '*** Your tank is almost empty! Fill up to continue driving! ***'.PHP_EOL;
}
