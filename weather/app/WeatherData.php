<?php

namespace Weather;

class WeatherData {
    private float $temperature;
    private float $windSpeed;
    private string $description;

   public function __construct(object $weatherData)
   {
       $this->temperature = $weatherData->main->temp;
       $this->windSpeed = $weatherData->wind->speed;
       $this->description = $weatherData->weather[0]->description;
   }

    public function getTemperature(): float
    {
        return $this->temperature;
    }

    public function getWindSpeed(): float
    {
        return $this->windSpeed;
    }
    public function getDescription(): string
    {
        return $this->description;
    }

}