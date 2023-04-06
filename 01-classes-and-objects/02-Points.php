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

    public function swapPoints($p1, $p2)
    {
        $tempX = $p1->x;
        $tempY = $p1->y;
        $p1->x = $p2->x;
        $p1->y = $p2->y;
        $p2->x = $tempX;
        $p2->y = $tempY;
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

$p1 = new Point(5, 2);
$p2 = new Point (-3, 6);
$p1->swapPoints($p1, $p2);

echo "(" . $p1->getX() . ", " . $p1->getY() . ")\n";
echo "(" . $p2->getX() . ", " . $p2->getY() . ")\n";