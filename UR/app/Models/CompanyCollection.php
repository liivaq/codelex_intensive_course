<?php declare(strict_types=1);

namespace App\Models;

class CompanyCollection {
    private array $companies;

    function __construct (array $apiData){
        $this->companies($apiData);
    }

    function companies($apiData){
        foreach ($apiData as $company){
            $this->companies[] = new Company($company->name, $company->regcode, $company->address);
        }
    }

    function getCompanies(): array{
        return $this->companies;
    }
}