<?php declare(strict_types=1);

class Car
{
    private FuelGauge $fuelGauge;
    private Odometer $odoMeter;
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

    public function getOdometer(): Odometer
    {
        return $this->odoMeter;
    }

    public function getTankSize(): int
    {
        return $this->tankSize;
    }

    public function getFuelGauge(): FuelGauge
    {
        return $this->fuelGauge;
    }

    public function drive()
    {
        if($this->getFuelGauge()->getFuelLevel() > 0) {
            $this->odoMeter->increaseMileage();
            $this->distanceCounter++;
        }
        if ($this->distanceCounter === $this->fuelEconomy) {
            $this->fuelGauge->useFuel();
            $this->distanceCounter = 0;
        }
    }
}
