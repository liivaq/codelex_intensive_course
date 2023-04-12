<?php declare(strict_types=1);

class Customer
{
    private array $inventory;
    private string $username;

    public function __construct(string $username)
    {
        $this->inventory = [];
        $this->username = $username;
    }

    public function takeHome(Video $video)
    {
        $this->inventory[] = $video;
    }

    public function getUsername(): string{
        return $this->username;
    }

    public function getInventory(): array
    {
        return $this->inventory;
    }

    public function giveBack(Video $video){
        $index = array_search($video, $this->inventory);
        unset($this->inventory[$index]);
    }

}