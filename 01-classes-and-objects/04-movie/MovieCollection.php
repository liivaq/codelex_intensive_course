<?php declare(strict_types=1);

class MovieCollection
{
    private array $collection;

    function __construct($collection = [])
    {
        $this->collection = $collection;
    }

    public function getPG($rating): array
    {
        $ratedMovies = [];
        foreach ($this->collection as $movie) {
            if ($movie->getRating() === $rating) {
                $ratedMovies[] = $movie;
            }
        }
        return $ratedMovies;
    }

    public function addToCollection(Movie ...$movies)
    {
        foreach ($movies as $movie) {
            $this->collection[] = $movie;
        }
    }
}