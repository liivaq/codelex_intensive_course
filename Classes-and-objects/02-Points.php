<?php declare(strict_types=1);

class Point
{
    private int $x;
    private int $y;

    function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function swapPoints(Point $toSwapWith)
    {
        $tempX = $this->x;
        $tempY = $this->y;
        $this->x = $toSwapWith->x;
        $this->y = $toSwapWith->y;
        $toSwapWith->x = $tempX;
        $toSwapWith->y = $tempY;
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function getY(): int
    {
        return $this->y;
    }
}

$point1 = new Point(5, 2);
$point2 = new Point (-3, 6);

echo 'Points before swapping: ' . PHP_EOL;
echo 'Point 1: (' . $point1->getX() . ', ' . $point1->getY() . ')' . PHP_EOL;
echo 'Point 2: (' . $point2->getX() . ', ' . $point2->getY() . ')' . PHP_EOL;

$point1->swapPoints($point2);

echo 'Points after swapping: ' . PHP_EOL;
echo 'Point 1: (' . $point1->getX() . ', ' . $point1->getY() . ')' . PHP_EOL;
echo 'Point 2: (' . $point2->getX() . ', ' . $point2->getY() . ')' . PHP_EOL;;