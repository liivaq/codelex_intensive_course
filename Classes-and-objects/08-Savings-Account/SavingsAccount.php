<?php

class SavingsAccount
{
    private int $balance;
    private int $annualInterestRate;

    public function __construct($balance)
    {
        $this->balance = $balance;
    }

    public function withdraw(int $amount)
    {
        $this->balance -= $amount;
    }

    public function deposit(int $amount)
    {
        $this->balance += $amount;
    }

    public function getMonthlyInterest()
    {
        return ($this->annualInterestRate / 12 /100) * $this->balance;
    }

    public function addMonthlyInterest(){
        $this->balance += $this->getMonthlyInterest();
    }

    public function setAnnualInterestRate($rate){
        $this->annualInterestRate = $rate;
    }

    public function getBalance(): int
    {
        return $this->balance;
    }

}