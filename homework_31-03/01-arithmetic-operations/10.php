<?php

class Geometry{
    public static function calculateCircleArea (): string{
        $radius = readline("Enter circles radius (cm): ");
        if($radius < 0 || !is_numeric($radius)){
            echo "Error: enter positive numeric values".PHP_EOL;
            return self::calculateCircleArea();
        }
        return "Circle's area is ". number_format((pi()*($radius**2)), 2).(" cm2").PHP_EOL;
    }
    public static function calculateRectangleArea (): string{
        $length = readline("Enter length (cm): ");
        $width = readline("Enter width (cm): ");
        if($length < 0 || $width < 0 || !is_numeric($length) || !is_numeric($width)){
            echo "Error: enter positive numeric values".PHP_EOL;
            return self::calculateRectangleArea();
        }
        return "Rectangle's area is ". number_format($length*$width, 2).(" cm2").PHP_EOL;
    }

    public static function calculateTriangleArea (): string{
        $base = readline("Enter triangles base (cm): ");
        $height = readline("Enter triangles height (cm): ");
        if($base < 0 || $height < 0 || !is_numeric($base) || !is_numeric($height)){
            echo "Error: enter positive numeric values".PHP_EOL;
            return self::calculateTriangleArea();
        }
        return "Triangle's area is ".$base*$height*0.5.(" cm2").PHP_EOL;
    }
}

echo "Geometry calculator: \n";
echo "[1] Calculate the Area of a Circle\n";
echo "[2] Calculate the Area of a Rectangle\n";
echo "[3] Calculate the Area of a Triangle\n";
echo "[4] Quit\n";

$selection = null;
while(!$selection){
    $usersChoice = (int) readline("Enter your choice (1-4): ");
    if($usersChoice < 0 || $usersChoice > 4) {
        echo "Error: invalid selection".PHP_EOL;
        continue;
    }
    $selection = $usersChoice;
}

switch($selection){
    case 1:
        echo Geometry::calculateCircleArea();
        break;
    case 2:
        echo Geometry::calculateRectangleArea();
        break;
    case 3:
        echo Geometry::calculateTriangleArea();
        break;
    case 4:
        exit;
}


