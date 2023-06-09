<?php declare(strict_types=1);

namespace App;

use GuzzleHttp\Client;

class Api
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function findCompanies($userInput): ?CompanyCollection
    {
        $url = 'https://data.gov.lv/dati/lv/api/3/action/datastore_search?q='
            . $userInput .
            '&resource_id=25e80bf3-f107-4ab4-89ef-251b5b9374e9';
        $response = $this->client->request('GET', $url);
        $data = json_decode($response->getBody()->getContents());

        if ($data->result->total === 0) {
            return null;
        }
        return new CompanyCollection($data->result->records);
    }
}



