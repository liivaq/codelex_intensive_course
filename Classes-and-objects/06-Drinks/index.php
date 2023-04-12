<?php

require_once 'DrinkSurveyResults.php';

$energyDrinks = new DrinkSurveyResults();
echo 'Total number of people surveyed ' . $energyDrinks->getPeopleSurveyed() . PHP_EOL;
echo 'Approximately ' . $energyDrinks->calculateEnergyDrinkers() . ' bought at least one energy drink.'.PHP_EOL;
echo 'Approximately ' . $energyDrinks->calculatePreferCitrus() . ' of them prefer citrus flavored energy drinks.'.PHP_EOL;