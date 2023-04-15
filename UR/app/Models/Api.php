<?php declare(strict_types=1);

namespace App\Models;

use GuzzleHttp\Client;

class Api
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function getData($userInput): ?CompanyInformation
    {
        $url = 'https://data.gov.lv/dati/lv/api/3/action/datastore_search?q='
            . $userInput .
            '&resource_id=25e80bf3-f107-4ab4-89ef-251b5b9374e9';
        $response = $this->client->request('GET', $url);
        $results = json_decode($response->getBody()->getContents());

        if ($results->result->total === 0) {
            return null;
        }

        return new CompanyInformation($results->result->records[0]);
    }
}



