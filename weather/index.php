<?php declare(strict_types=1);

require_once 'vendor/autoload.php';

use Weather\WeatherData;
use Weather\Connection;

echo 'Welcome to Today\'s Weather forecast!'.PHP_EOL;

$apiKey = readline('Enter your OpenWeather API key to continue: ');
$city = readline('Enter city to get weather data: ');

$connection = new Connection($apiKey, $city);

if(!$connection->checkIfExists()){
    echo "Could not retrieve weather data. Check your spelling and api key.".PHP_EOL;
    return;
}

$weatherData = new WeatherData($connection->getWeatherData());

echo PHP_EOL.'Weather today for '.$city.PHP_EOL;
echo '» Temperature: '.$weatherData->getTemperature().' °C'.PHP_EOL;
echo '» Description: '.$weatherData->getDescription().PHP_EOL;
echo '» Wind speed: '.$weatherData->getWindSpeed().' m/s'.PHP_EOL;