<?php declare(strict_types=1);

class Car
{
    private FuelGauge $fuelGauge;
    private Odometer $odoMeter;
    private int $fuelEconomy;
    private float $tankSize;

    function __construct(FuelGauge $fuelGauge, Odometer $odoMeter, int $tankSize = 70, int $fuelEconomy = 10)
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

    public function getTankSize(): float
    {
        return $this->tankSize;
    }

    public function getFuelGauge(): FuelGauge
    {
        return $this->fuelGauge;
    }

    public function drive()
    {
        if($this->getFuelGauge()->getLiters() > 0) {
            $this->odoMeter->increaseMileage();
            $this->fuelGauge->useFuel($this->fuelEconomy);
        }
    }

    public function getFuelEconomy(){
        return $this->fuelEconomy;
    }
}
