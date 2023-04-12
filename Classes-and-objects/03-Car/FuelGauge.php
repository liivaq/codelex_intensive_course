<?php declare(strict_types=1);

class FuelGauge
{
    private float $liters;

    function __construct(int $liters)
    {
        $this->liters = $liters;
    }

    public function getLiters(): float
    {
        return (float)number_format($this->liters, 2);
    }

    public function fillTank(int $amount)
    {
        if($amount > 0) {
            $this->liters += $amount;
        }
    }

    public function useFuel(int $fuelEconomy)
    {
        if ($this->liters > 0) {
            $this->liters-= $fuelEconomy/100;
        }
    }
}



