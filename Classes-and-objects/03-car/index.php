<?php declare(strict_types=1);

include 'Car.php';
include 'FuelGauge.php';
include 'OdoMeter.php';

$car = new Car(new FuelGauge(0), new Odometer(999900));

while ($car->getFuelGauge()->getFuelLevel() < $car->getTankSize()) {
    $car->getFuelGauge()->fillTank();
}

while ($car->getFuelGauge()->getFuelLevel() !== 0) {
    $car->drive();
    echo "Current mileage is: {$car->getOdometer()->getMileage()} km\n";
    echo "Amount of fuel left: {$car->getFuelGauge()->getFuelLevel()} l\n";
    if ($car->getFuelGauge()->getFuelLevel() === 0) {
        echo 'You ran out of fuel! Fill up to continue driving' . PHP_EOL;
    }
}
