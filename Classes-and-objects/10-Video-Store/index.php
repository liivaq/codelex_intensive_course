<?php

require_once 'Application.php';
require_once 'Video.php';
require_once 'VideoStore.php';

$store = new VideoStore(new Video('Matrix'), new Video('Interstellar'), new Video('Joker'));
(new Application($store))->run();