<?php

require_once 'Application.php';
require_once 'Video.php';
require_once 'VideoStore.php';
require_once 'Customer.php';

$video1 = new Video('Matrix', false);
$video2 = new Video('Armageddon', false);
$store = new VideoStore(
    $video1,
    new Video('Interstellar'),
    new Video('Joker'),
    new Video('JoJo Rabbit'),
    $video2
);

$user1 = new Customer('movielover123');
$user2 = new Customer('bobo');

$user1->takeHome($video1);
$user2->takeHome($video2);

$store->newCustomer($user1);
$store->newCustomer($user2);

(new Application($store))->run();