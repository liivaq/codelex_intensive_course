<?php declare(strict_types=1);

class Movie
{
    private string $title;
    private string $studio;
    private string $rating;

    function __construct(string $title, string $studio, string $rating)
    {
        $this->title = $title;
        $this->studio = $studio;
        $this->rating = $rating;
    }

    public function getRating(): string
    {
        return $this->rating;
    }

    public function getStudio(): string
    {
        return $this->studio;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}