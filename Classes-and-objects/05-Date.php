<?php declare(strict_types=1);

//fyi there exists an inbuilt PHP class DateTime;

class Date
{
    private int $day;
    private int $month;
    private int $year;

    function __construct($day, $month, $year)
    {
        if (checkdate($month, $day, $year)) {
            $this->day = $day;
            $this->month = $month;
            $this->year = $year;
        } else {
            $this->day = (int)date('d');
            $this->month = (int)date('m');
            $this->year = (int)date('Y');
            echo 'The date you entered does not exist. Date has been set to current date' . PHP_EOL;
        }
    }

    public function getDay(): int
    {
        return $this->day;
    }

    public function getMonth(): int
    {
        return $this->month;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function setDay(int $day): void
    {
        if (checkdate($this->month, $day, $this->year)) {
            $this->day = $day;
        } else {
            echo 'Date not changed - entered date does not exist!' . PHP_EOL;
        }
    }

    public function setMonth(int $month): void
    {
        if (checkdate($month, $this->day, $this->year)) {
            $this->month = $month;
        } else {
            echo 'Date not changed - entered date does not exist!' . PHP_EOL;
        }
    }

    public function setYear(int $year): void
    {
        if (checkdate($this->month, $this->day, $year)) {
            $this->year = $year;
        } else {
            echo 'Date not changed - entered date does not exist!' . PHP_EOL;
        }
    }

    public function displayDate(): void
    {
        echo $this->getDay() . '/' . $this->getMonth() . '/' . $this->getYear() . "\n";
    }

}

$date = new Date(9, 02, 2022);
$date->displayDate();

$testWrongDate = new Date(34, 05, 2022);
$testWrongDate->displayDate();