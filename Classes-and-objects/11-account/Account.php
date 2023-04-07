<?php declare(strict_types=1);

class Account
{
    private int $balance;
    private string $name;

    public function __construct(string $name, int $balance)
    {
        $this->balance = $balance;
        $this->name = $name;
    }

    public function getBalance(): int
    {
        return $this->balance;
    }
    public function getName(): string {
        return $this->name;
    }

    public function withdrawal(int $amount)
    {
        $this->balance -= $amount;
    }

    public function deposit(int $amount)
    {
        $this->balance += $amount;
    }

    function transfer(Account $from, Account $to, int $amount)
    {
        $from->withdrawal($amount);
        $to->deposit($amount);
    }
}