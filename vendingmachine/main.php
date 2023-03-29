<?php

function makeProduct(string $name, int $price): stdClass
{
    $product = new stdClass();
    $product->name = $name;
    $product->price = $price;
    return $product;
}

$vendingMachine = [
    makeProduct("Coffee", 287),
    makeProduct("Tea", 181),
    makeProduct("Hot chocolate", 197),
];
$coins = ["2"=>200, "1"=> 100, "0.50"=>50, "0.20"=>20, "0.10"=>10, "0.02"=>2, "0.01"=>1];

foreach ($vendingMachine as $key => $product) {
    $price = number_format($product->price / 100, 2);
    echo "[$key] $product->name: {$price}€" . PHP_EOL;
}

$selectedProduct = null;
while(!$selectedProduct) {
    $selection = readline("Select your product: ");
    if (!array_key_exists($selection, $vendingMachine)){
        echo "***Invalid selection***".PHP_EOL;
        continue;
    }
    $selectedProduct = $vendingMachine[$selection];
}

echo "_____________________________________________" . PHP_EOL;
echo "Allowed coins: 2, 1, 0.50, 0.20, 0.01, 0.02\n";
echo "_____________________________________________" . PHP_EOL;
echo "You have selected: $selectedProduct->name" . PHP_EOL;
$payment = 0;
$reminder = $selectedProduct->price;

while ($payment < $selectedProduct->price) {
    echo "Necessary payment: ".number_format($reminder/ 100, 2)."€".PHP_EOL;

    $insertedCoin = readline("Insert coins: ");
    if(!array_key_exists($insertedCoin, $coins)){
        echo "***Invalid input!***".PHP_EOL;
        continue;
    }
    $insertedCoin = $coins[$insertedCoin];
    echo"_____________________________________________".PHP_EOL;

    if ($insertedCoin > $reminder) {
        $coinsToGive = $insertedCoin - $reminder;
        $change = [];
        foreach ($coins as $coin) {
            $times = floor($coinsToGive / $coin);
            $coinsToGive -= $coin * $times;
            if ($times != 0) {
                $coin = number_format($coin / 100, 2);
                $change[$coin] = $times;
            }
        }
        echo "Change: ".PHP_EOL;
        foreach ($change as $coin=>$times){
            echo "   $coin € x $times ".PHP_EOL;
        }
        echo "*** Enjoy your $selectedProduct->name! ***". PHP_EOL;
    }
    $reminder -= $insertedCoin;
    $payment += $insertedCoin;
}

