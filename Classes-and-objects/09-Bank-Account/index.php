<?php

require_once 'BankAccount.php';

$benson = new BankAccount('Benson', -17.50);
echo $benson->showUserNameAndBalance().PHP_EOL;