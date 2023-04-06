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

class Store
{
    private array $products;

    public function addProduct(object $product): void
    {
        $this->products[] = $product;
    }

    public function displayProducts(): void
    {
        foreach ($this->products as $product) {
            $product->printProduct();
        }
    }
}

$mouse = new Product("Logitech mouse", 70.00, 14);
$iPhone = new Product("iPhone 5s", 999.99, 3);
$printer = new Product("Epson EB-U05", 440.46, 1);


$store = new Store;
$store->addProduct($mouse);
$store->addProduct($iPhone);
$store->addProduct($printer);

$mouse->changePrice(59.99);
$printer->changeQuantity(9);

$store->displayProducts();



