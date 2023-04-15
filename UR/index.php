<?php declare(strict_types=1);

require_once 'vendor/autoload.php';

use App\Models\Api;
use App\Models\Company;

while(true) {
    echo '─────────────────────────────────────────'.PHP_EOL;
    echo '[1] to exit'.PHP_EOL;
    echo '[2] to search by registration number'.PHP_EOL;
    echo '[3] to search by name'.PHP_EOL;
    $choice = readline('Enter your choice: ');

    switch ($choice){
        case 1:
           echo 'Bye!'.PHP_EOL;
           exit;
        case 2:
            searchByRegistration();
            break;
        case 3:
            searchByName();
            break;
        default:
            echo '*** Wrong input ***'.PHP_EOL;
            continue 2;
    }
}

function searchByRegistration(){
    $api = new Api();
    $userInput = (int)readline('Enter company\'s registration number: ');
    $data = $api->getData($userInput);

    if (!$data || $data->getCompanies()[0]->getRegistration() !== $userInput) {
        echo '*** No company found with this registration number ***'.PHP_EOL;
        return;
    }

    printInformation($data->getCompanies());;
}

function searchByName(){
    $api = new Api();
    $userInput = readline('Enter company\'s name: ');
    $data = $api->getData($userInput);

    if (!$data) {
        echo '*** No company found with this name - check your spelling ***'.PHP_EOL;
        return;
    }
    printInformation($data->getCompanies());
}

function printInformation($companies){
    /** @var Company $company */
    foreach ($companies as $company){
        echo '┌───────────────────────────────────────────────────────────────────────────────────────┐'.PHP_EOL;
        echo '  » Name: ' . $company->getName() . PHP_EOL;
        echo '  » Registration no.: ' . $company->getRegistration() . PHP_EOL;
        echo '  » Address: ' . $company->getAddress() . PHP_EOL;
        echo '└───────────────────────────────────────────────────────────────────────────────────────┘'.PHP_EOL;
    }
}






