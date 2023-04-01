<?php

class Employee
{
    public int $basePay;
    public int $hoursWorked;
    public string $id;

    public function __construct(int $basePay, int $hoursWorked, string $id)
    {
        $this->basePay = $basePay;
        $this->hoursWorked = $hoursWorked;
        $this->id = $id;
    }

    public function calculatePay(): string
    {
        $basePay = $this->basePay;
        $hoursWorked = $this->hoursWorked;
        if ($basePay < 800) {
            return 'Base pay is too low' . PHP_EOL;
        }
        if ($hoursWorked > 60) {
            return 'Worked hours are too high' . PHP_EOL;
        }
        if ($hoursWorked > 40) {
            return "Total pay is: " . ((($hoursWorked - 40) * 1.5 * $basePay) + (40 * $basePay)) / 100 . "€" . PHP_EOL;
        }
        return "Total pay is: " . ($hoursWorked * $basePay) / 100 . "€" . PHP_EOL;
    }
}

class EmployeeSalaries
{
    public array $employees;

    public function getSalaries(): void
    {
        foreach ($this->employees as $employee) {
            echo "Employee ID $employee->id salary: " . $employee->calculatePay();
        }

    }
}

$employeeSalaries = new EmployeeSalaries();

$employeeSalaries->employees[] = new Employee(750, 35, "#123");
$employeeSalaries->employees[] = new Employee(820, 47, "#674");
$employeeSalaries->employees[] = new Employee(1000, 73, "#31286");

$employeeSalaries->getSalaries();

