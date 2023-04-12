<?php declare(strict_types=1);

class Product
{
    private float $price;
    private int $amount;
    private string $name;

    function __construct(string $name, float $price, int $amount)
    {
        $this->price = $price;
        $this->name = $name;
        $this->amount = $amount;
    }

    public function printProduct(): void
    {
        echo "$this->name, price $this->price EUR, amount $this->amount units" . PHP_EOL;
    }

    public function changePrice(float $price): void
    {
        $this->price = $price;
    }

    public function changeQuantity(int $amount): void
    {
        $this->amount = $amount;
    }
}


