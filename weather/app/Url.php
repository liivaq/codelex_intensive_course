<?php declare(strict_types=1);

namespace Weather;

use GuzzleHttp\Client;

class Url
{
    private string $url;

    public function __construct(string $location, string $apiKey)
    {
        $this->url = 'https://api.openweathermap.org/data/2.5/weather?q=' .
            $location .
            '&appid=' . $apiKey . '&units=metric';
    }

    public function checkIfExists(): bool
    {
        $htmlResponse = get_headers($this->url)[0];
        if (!strpos($htmlResponse, '200')) {
            return false;
        }
        return true;
    }

    public function getWeatherReport(): WeatherReport
    {
        $client = new Client();
        $response = $client->request(
            'GET', $this->url);

        return new WeatherReport(json_decode($response->getBody()->getContents()));
    }

}

