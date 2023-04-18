<?php declare(strict_types=1);

namespace App;

use DateTime;

class Company
{
    private string $name;
    private int $registration;
    private string $address;
    private string $dateRegistered;
    private ?string $status;

    public function __construct(
        string  $name,
        int     $registration,
        string  $address,
        string  $dateRegistered,
        ?string $status)
    {
        $this->name = $name;
        $this->registration = $registration;
        $this->address = $address;
        $this->dateRegistered = $dateRegistered;
        $this->status = $status;

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

    public function getDateRegistered(): DateTime
    {
        return date_create($this->dateRegistered);
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

}