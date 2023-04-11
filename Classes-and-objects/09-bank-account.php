<?php declare(strict_types=1);

class BankAccount{
    private string $name;
    private float $balance;

    public function __construct(string $name, float $balance)
    {
        $this->balance = $balance;
        $this->name = $name;
    }

    public function showUserNameAndBalance (): string{
        $balance = number_format(abs($this->balance), 2);
        if($this->balance <0){
            return $this->name.', -$'.$balance;
        }
        return $this->name.', $'.$balance;
    }
}

$benson = new BankAccount('Benson', -17.50);
echo $benson->showUserNameAndBalance();