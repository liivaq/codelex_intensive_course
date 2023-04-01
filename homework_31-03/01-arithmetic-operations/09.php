<?php

//Write a program that calculates and displays a person's body mass index (BMI).
// A person's BMI is calculated with the following formula: BMI = weight x 703 / height ^ 2.
// Where weight is measured in pounds and height is measured in inches.
// Display a message indicating whether the person has optimal weight, is underweight, or is overweight.
// A sedentary person's weight is considered optimal if his or her BMI is between 18.5 and 25.
// If the BMI is less than 18.5, the person is considered underweight.
// If the BMI value is greater than 25, the person is considered overweight.
//Your program must accept metric units.

//weight in kg, height in cm
function calculateBMI(int $weight, int $height): string{
    $weightInPounds = $weight*2.2;
    $heightInInches = ($height/100)*39.26;
    $bmi = number_format((($weightInPounds * 703) / $heightInInches**2), 2);

    if($bmi<18.5){
        return "Your BMI is $bmi - you are underweight";
    }

    if($bmi>25){
        return "Your BMI is $bmi - you are overweight";
    }

    return "Your BMI is $bmi - you have optimal weight";
}

echo calculateBMI(53, 165);