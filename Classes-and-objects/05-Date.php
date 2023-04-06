<?php declare(strict_types=1);

class Date
{
    private int $day;
    private int $month;
    private int $year;

    function __construct($day, $month, $year)
    {
        if (checkdate($month, $day, $year)) {
            $this->setDay($day);
            $this->setMonth($month);
            $this->setYear($year);
        } else {
            echo "This date doesn't exist!";
            exit;
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
        $this->day = $day;
    }

    public function setMonth(int $month): void
    {
        $this->month = $month;
    }

    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    public function displayDate(): void
    {
        echo $this->getDay() . '/' . $this->getMonth() . "/" . $this->getYear() . "\n";
    }

}

$date = new Date(9, 02, 2022);
$date->displayDate();