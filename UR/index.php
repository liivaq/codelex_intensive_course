<?php declare(strict_types=1);

require_once 'vendor/autoload.php';

use App\Api;
use App\Company;

echo "*** Company Register ***" . PHP_EOL;
while (true) {
    echo '─────────────────────────────────────────' . PHP_EOL;
    echo '[1] to search by name' . PHP_EOL;
    echo '[2] to search by registration number' . PHP_EOL;
    echo '[3] to exit' . PHP_EOL;
    $choice = readline('Enter your choice: ');

    switch ($choice) {
        case 1:
            searchByName();
            break;
        case 2:
            searchByRegistration();
            break;
        case 3:
            echo 'Bye!' . PHP_EOL;
            exit;
        default:
            echo '*** Wrong input ***' . PHP_EOL;
            continue 2;
    }
}

function searchByRegistration()
{
    $api = new Api();
    $userInput = (int)readline('Enter company\'s registration number: ');
    $data = $api->findCompanies($userInput);

    if (!$data || $data->getCompanies()[0]->getRegistration() !== $userInput) {
        echo '*** No company found with this registration number ***' . PHP_EOL;
        return;
    }

    printInformation($data->getCompanies());
}

function searchByName()
{
    $api = new Api();
    $userInput = readline('Enter company\'s name: ');
    $data = $api->findCompanies($userInput);

    if (!$data) {
        echo '*** No company found with this name - check your spelling ***' . PHP_EOL;
        return;
    }
    printInformation($data->getCompanies());
}

function printInformation($companies)
{
    /** @var Company $company */
    foreach ($companies as $company) {
        echo '┌───────────────────────────────────────────────────────────────────────────────────────┐' . PHP_EOL;
        echo '  » Name: ' . $company->getName() . PHP_EOL;
        echo '  » Registration no.: ' . $company->getRegistration() . PHP_EOL;
        echo '  » Address: ' . $company->getAddress() . PHP_EOL;
        echo '  » Date Registered: ' . $company->getDateRegistered()->format('d-m-Y') . PHP_EOL;
        echo '  » Status: ';
        if ($company->getStatus()) {
            echo 'terminated on ' . date_create($company->getStatus())->format('d-m-Y') . PHP_EOL;
        } else {
            echo 'Active' . PHP_EOL;
        }
        echo '└───────────────────────────────────────────────────────────────────────────────────────┘' . PHP_EOL;
    }
}