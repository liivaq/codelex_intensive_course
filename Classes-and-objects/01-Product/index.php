<?php

require_once 'Product.php';

$mouse = new Product("Logitech mouse", 70.00, 14);
$iPhone = new Product("iPhone 5s", 999.99, 3);
$printer = new Product("Epson EB-U05", 440.46, 1);

$products = [$mouse, $printer, $iPhone];

$mouse->changePrice(59.99);
$printer->changeQuantity(45);

foreach ($products as $product) {
    $product->printProduct();
}
