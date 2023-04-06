<?php declare(strict_types=1);

class Car
{
    private object $fuelGauge;
    private object $odoMeter;
    private int $fuelEconomy; // how many kms per liter
    private int $tankSize;
    private int $distanceCounter = 0;

    function __construct(FuelGauge $fuelGauge, Odometer $odoMeter, int $fuelEconomy = 10, int $tankSize = 70)
    {
        $this->fuelGauge = $fuelGauge;
        $this->odoMeter = $odoMeter;
        $this->fuelEconomy = $fuelEconomy;
        $this->tankSize = $tankSize;
    }

    public function getOdometer(): object
    {
        return $this->odoMeter;
    }

    public function getTankSize(): int
    {
        return $this->tankSize;
    }

    public function getFuelGauge(): object
    {
        return $this->fuelGauge;
    }

    public function drive()
    {
        $this->odoMeter->increaseMileage();
        $this->distanceCounter++;

        if ($this->distanceCounter === $this->fuelEconomy) {
            $this->fuelGauge->useFuel();
            $this->distanceCounter = 0;
        }
    }
}
