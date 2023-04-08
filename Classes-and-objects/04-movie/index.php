<?php declare(strict_types=1);

require_once 'Movie.php';
require_once 'MovieCollection.php';

$movies = new MovieCollection();

$movieCasino = new Movie('Casino Royal', 'Eon Productions', 'PG13');
$movieGlass = new Movie ('Glass', 'Buena Vista International', 'PG13');
$movieSpider = new Movie ('Spider-Man: Into the Spider-Verse', 'Columbia Pictures', 'PG');

$movies->addToCollection($movieCasino, $movieGlass, $movieSpider);

echo 'PG13 rated movies found in the collection: ' . PHP_EOL;
foreach ($movies->getPG('PG13') as $movie) {
    echo '--' . $movie->getTitle() . ' / ' . $movie->getStudio() . ' / ' . $movie->getRating() . PHP_EOL;
}