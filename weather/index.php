<?php declare(strict_types=1);

require_once 'vendor/autoload.php';

use Dotenv\Dotenv;
use Weather\Url;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

echo 'Welcome to Today\'s Weather forecast!' . PHP_EOL;
$city = readline('Enter city to get weather data: ');

$url = new Url($city, $_ENV['API_KEY']);

if (!$url->checkIfExists()) {
    echo '*** Could not retrieve weather data. Check your spelling. ***' . PHP_EOL;
    exit;
}

$weatherReport = $url->getWeatherReport();
echo '_____________________________________________' . PHP_EOL;
echo 'Weather today for ' . ucwords($city . PHP_EOL);
echo '  » Temperature: ' . $weatherReport->getTemperature() . ' °C' . PHP_EOL;
echo '  » Description: ' . $weatherReport->getDescription() . PHP_EOL;
echo '  » Wind speed: ' . $weatherReport->getWindSpeed() . ' m/s' . PHP_EOL;