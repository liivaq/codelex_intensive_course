<?php declare(strict_types=1);

class FuelGauge
{
    private int $fuelLevel;

    function __construct($fuelLevel)
    {
        $this->fuelLevel = $fuelLevel;
    }

    public function getFuelLevel(): int
    {
        return $this->fuelLevel;
    }

    public function fillTank()
    {
        $this->fuelLevel++;
    }

    public function useFuel()
    {
        if ($this->fuelLevel > 0) {
            $this->fuelLevel--;
        }
    }
}



