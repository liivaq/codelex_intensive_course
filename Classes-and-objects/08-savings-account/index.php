<?php

require_once 'SavingsAccount.php';

$money = readline('How much money is in the account? ');
$annualRate = readline('Enter the annual interest rate: ');

$account = new SavingsAccount($money);
$account->setAnnualInterestRate($annualRate);

$months = readline ('How long has the account been opened? ');
$interestEarned = 0;
$totalDeposit = 0;
$totalWithdrawn = 0;

for($i=1; $i<=$months; $i++){
    $deposit = (int)readline("Enter amount deposited for month: $i: ");
    $account->deposit($deposit);
    $totalDeposit += $deposit;

    $withdrawal = (int) readline("Enter the amount withdrawn for month: $i: ");
    $account->withdraw($withdrawal);
    $totalWithdrawn += $withdrawal;

    $interestEarned += $account->getMonthlyInterest();
    $account->addMonthlyInterest();
}

echo 'Total deposited: '.$totalDeposit.PHP_EOL;
echo 'Total withdrawn: '.$totalWithdrawn.PHP_EOL;
echo 'Interest earned: '.$interestEarned.PHP_EOL;
echo 'Ending balance: '.$account->getBalance().PHP_EOL;