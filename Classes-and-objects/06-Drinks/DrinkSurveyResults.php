<?php declare(strict_types=1);

class DrinkSurveyResults
{
    private int $peopleSurveyed;
    private float $purchasedDrinks;
    private float $preferCitrus;

    public function __construct(int $surveyed = 12467, float $purchasedDrinks = 0.14, float $preferCitrus = 0.64)
    {
        $this->peopleSurveyed = $surveyed;
        $this->preferCitrus = $preferCitrus;
        $this->purchasedDrinks = $purchasedDrinks;
    }

    public function calculateEnergyDrinkers(): float
    {
        return round($this->peopleSurveyed * $this->purchasedDrinks);
    }

    public function calculatePreferCitrus(): float
    {
        return round($this->peopleSurveyed * $this->purchasedDrinks * $this->preferCitrus);
    }

    public function getPeopleSurveyed(): int
    {
        return $this->peopleSurveyed;
    }
}


