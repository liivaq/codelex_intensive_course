<?php declare(strict_types=1);

require_once 'Account.php';

$bartosAccount = new Account('Barto\'s Account', 100);
$bartosSwissAccount = new Account('Barto\'s Account in Switzerland', 1000000);

echo "Initial state:\n";
echo $bartosAccount->getName().' : '.$bartosAccount->getBalance().PHP_EOL;
echo $bartosSwissAccount->getName().' : '.$bartosSwissAccount->getBalance().PHP_EOL;

$bartosAccount->withdrawal(20);
echo $bartosAccount->getName().' balance now is: '.$bartosAccount->getBalance().PHP_EOL;
echo $bartosSwissAccount->getName(). ' balance now is: '.$bartosSwissAccount->getBalance().PHP_EOL;


$mattsAccount = new Account('Matt\'s Account', 1000);
$myAccount = new Account ('My Account', 0);

$mattsAccount->withdrawal(100);
$myAccount->deposit(100);

echo $mattsAccount->getName().' balance: '.$mattsAccount->getBalance().PHP_EOL;
echo $myAccount->getName().' balance: '.$myAccount->getBalance().PHP_EOL;

$accountA = new Account('A', 100);
$accountB = new Account ('B', 0);
$accountC = new Account('C', 0);

$accountA->transfer($accountA, $accountB, 50);
$accountB->transfer($accountB, $accountC, 25);

echo $accountA->getName(). ' balance: '.$accountA->getBalance().PHP_EOL;
echo $accountB->getName(). ' balance: '.$accountB->getBalance().PHP_EOL;
echo $accountC->getName(). ' balance: '.$accountC->getBalance().PHP_EOL;

