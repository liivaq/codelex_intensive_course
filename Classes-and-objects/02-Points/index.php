<?php

require_once 'Point.php';

$point1 = new Point(5, 2);
$point2 = new Point (-3, 6);

echo 'Points before swapping: ' . PHP_EOL;
echo 'Point 1: (' . $point1->getX() . ', ' . $point1->getY() . ')' . PHP_EOL;
echo 'Point 2: (' . $point2->getX() . ', ' . $point2->getY() . ')' . PHP_EOL;

$point1->swapPoints($point2);

echo 'Points after swapping: ' . PHP_EOL;
echo 'Point 1: (' . $point1->getX() . ', ' . $point1->getY() . ')' . PHP_EOL;
echo 'Point 2: (' . $point2->getX() . ', ' . $point2->getY() . ')' . PHP_EOL;;