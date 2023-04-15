<?php declare(strict_types=1);

namespace App\Models;
class Company{
    private string $name;
    private int $registration;
    private string $address;

    public function __construct(string $name, int $registration, string $address)
    {
        $this->name = $name;
        $this->registration = $registration;
        $this->address = $address;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getRegistration(): int
    {
        return $this->registration;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

}