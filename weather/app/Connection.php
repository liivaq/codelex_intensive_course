<?php

namespace Weather;

use GuzzleHttp\Client;

class Connection{
    private string $apiKey;
    private string $location;
    private string $url;

    public function __construct(string $apiKey, string $location){
        $this->apiKey = $apiKey;
        $this->location = $location;
        $this->url = 'https://api.openweathermap.org/data/2.5/weather?q=' .
            $this->location .
            '&appid=' . $this->apiKey . '&units=metric';
    }

    public function checkIfExists(): bool{
        $htmlResponse = get_headers($this->url)[0];

        if(!strpos( $htmlResponse, '200')) {
            return false;
        }
        return true;
    }

    public function getWeatherData(): object{
        $client = new Client();
        $response = $client->request(
            'GET',$this->url);

        return json_decode($response->getBody());
    }

}
