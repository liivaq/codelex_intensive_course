<?php declare(strict_types=1);

require_once 'vendor/autoload.php';

use App\Models\Api;

$api = new Api();
$userInput = (int)readline('Enter company\'s registration number: ');
$data = $api->getData($userInput);

if(!$data){
    return "False";
}

if($data->getRegistrationNumber() !== $userInput){
    return 'False';
}

echo 'Name: '.$data->getName().PHP_EOL;
echo 'Registration nr: '.$data->getRegistrationNumber().PHP_EOL;
echo 'Address '.$data->getAddress().PHP_EOL;




