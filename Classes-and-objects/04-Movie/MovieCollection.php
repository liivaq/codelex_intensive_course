<?php declare(strict_types=1);

class MovieCollection
{
    private array $collection = [];

    public function __construct(Movie ...$movies)
    {
        array_push($this->collection, ...$movies);
    }

    public function getPG(string $rating): array
    {
        $ratedMovies = [];
        foreach ($this->collection as $movie) {
            if ($movie->getRating() === $rating) {
                $ratedMovies[] = $movie;
            }
        }
        return $ratedMovies;
    }
}