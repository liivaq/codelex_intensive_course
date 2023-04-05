<?php

$apiKey = 'c091f51dbced57102b4550d2f72c806b';

$city = readline("Enter a city to get today's weather: ");
$url = "https://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey&units=metric";


if(empty(json_decode(file_get_contents($url)))){
    echo "Invalid input";
    exit;
}

$weatherData = json_decode(file_get_contents($url));

$temperature = $weatherData->main->temp;
$description = $weatherData->weather[0]->description;
$windSpeed = $weatherData->wind->speed;
echo "Temperature: $temperature C\nDescription: $description\nWind speed: $windSpeed m/s".PHP_EOL;


