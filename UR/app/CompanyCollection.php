<?php declare(strict_types=1);

namespace App;

class CompanyCollection
{
    private array $companies;

    public function __construct(array $apiData)
    {
        $this->companies($apiData);
    }

    public function companies($apiData)
    {
        foreach ($apiData as $company) {
            $this->companies[] = new Company(
                $company->name,
                $company->regcode,
                $company->address,
                $company->registered,
                $company->terminated);
        }
    }

    public function getCompanies(): array
    {
        return $this->companies;
    }
}