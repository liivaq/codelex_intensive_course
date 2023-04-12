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

