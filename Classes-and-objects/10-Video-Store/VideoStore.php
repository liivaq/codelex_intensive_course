<?php

class VideoStore
{
    private array $inventory = [];
    private array $customers = [];

    function __construct(Video ...$videos)
    {
        array_push($this->inventory, ...$videos);
    }

    function getInventory(): array
    {
        return $this->inventory;
    }

    function addVideoToInventory(Video $video)
    {
        $this->inventory[] = $video;
    }

    public function checkIfExists($title): bool
    {
        foreach ($this->getInventory() as $video) {
            if ($video->getTitle() === $title) {
                return true;
            }
        }
        return false;
    }

    public function newCustomer(Customer $customer)
    {
        $this->customers[] = $customer;
    }

    public function getCustomerByUsername(string $username): ?Customer
    {
        foreach ($this->customers as $customer) {
            if ($customer->getUsername() === $username) {
                return $customer;
            }
        }
        return null;
    }

    public function getCustomers(): array
    {
        return $this->customers;
    }

    public function getVideoID(Video $video): int
    {
        return array_search($video, $this->inventory);
    }
}