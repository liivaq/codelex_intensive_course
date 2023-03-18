<?php

//Given array, Program should display concatenated value of - Jane Doe 41

$items = [
    [
        [
            "name" => "John",
            "surname" => "Doe",
            "age" => 50
        ],
        [
            "name" => "Jane",
            "surname" => "Doe",
            "age" => 41
        ]
    ]
];

echo "{$items[0][1]["name"]} {$items[0][1]["surname"]} {$items[0][1]["age"]} ";

