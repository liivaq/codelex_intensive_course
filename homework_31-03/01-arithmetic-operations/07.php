<?php

//Modify the example program to compute the position of an object after falling for 10 seconds, outputting the position in meters.

function gravity (int $initialVelocity=0, int $initialPosition=0, float $acceleration = -9.81, int $time = 10): string{
    return 0.5*$acceleration*($time*$time) + $initialVelocity*$time + $initialPosition." m";
}

var_dump(gravity());