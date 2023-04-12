<?php

require_once 'Date.php';

$date = new Date(9, 02, 2022);
$date->displayDate();

$testWrongDate = new Date(34, 05, 2022);
$testWrongDate->displayDate();